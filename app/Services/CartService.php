<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class CartService
{
    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function cart(Request $request,$id){
        if (Auth::id()){
            $user=Auth::user();
            $userid=$user->id;
            $product=Product::find($id);

            $product_exist_id=Cart::where('product_id','=',$id)->where('user_id','=',$userid)->get('id')->first();
            if ($product_exist_id)
            {
                $cart=Cart::find($product_exist_id)->first();
                $stock=$cart->stock;
                $cart->stock=$stock+$request->stock;
                if (!empty($product->discount_price))
                {
                    $cart->price=$product->discount_price*$cart->stock;
                }else{
                    $cart->price=$product->price*$cart->stock;
                }
                $cart->save();
                Alert::info('Product has been added in cart');
                return redirect()->route('show.cart');
            }
            else
            {
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
                Alert::info('Product has been added in cart');
                return redirect()->route('show.cart');
            }
        }
        else
        {
            return redirect()->route('login');
        }
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|void
     */
    public function showcart()
    {
        if(Auth::id()){
            $id=Auth::user()->id;
            return view('website.product.cart',['carts'=>Cart::where('user_id','=',$id)->get()]);
        }
    }

    /**
     * @param Cart $cart
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteCart(Cart $cart)
    {
        $cart->delete();
        return redirect()->back();
    }
}
