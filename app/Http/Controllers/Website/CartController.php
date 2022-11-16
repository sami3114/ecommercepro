<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cart(Request $request,$id){
        if (Auth::id()){
            $user=Auth::user();
            $product=Product::find($id);
            $cart=new Cart();
            $cart->name=$product->title;
            if (!empty($product->discount_price))
            {
                $cart->price=$product->discount_price*$request->stock;
            }else{
                $cart->price=$product->price*$request->stock;
            }

            $cart->stock=$request->stock;
            $cart->image=$product->image;
            $cart->product_id=$product->id;
            $cart->user_id=$user->id;
            $cart->save();

            return redirect()->route('show.cart');
        }
        else
        {
            return redirect()->route('login');
        }
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|void
     */

    public function showCart(){
        if(Auth::id()){
            $id=Auth::user()->id;
            return view('website.product.cart',['carts'=>Cart::where('user_id','=',$id)->get()]);
        }
    }

    /**
     * @param Cart $cart
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeCart(Cart $cart)
    {
        $cart->delete();
        return redirect()->back();
    }

}
