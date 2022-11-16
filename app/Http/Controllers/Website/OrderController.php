<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Product;
use App\Models\Reply;
use http\Env;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Stripe;


class OrderController extends Controller
{
    /**
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function orderProduct(){
        if(Auth::id()){
            $id=Auth::user()->id;
            $carts=Cart::where('user_id','=',$id)->get();
            foreach ($carts as $cart){
                $order=new Order();
                $order->name=$cart->name;
                $order->price=$cart->price;
                $order->stock=$cart->stock;
                $order->image=$cart->image;
                $order->payment_status="cash on delivery";
                $order->delivery_status="Processing";
                $order->product_id=$cart->product_id;
                $order->user_id=$cart->user_id;
                $order->save();

                $cart_id=$cart->id;
                $data=Cart::find($cart_id);
                $data->delete();
            }
            return redirect()->back()->with('message','We have received your order.We will contact with you soon.');
        }
    }

    /**
     * @param $totalAmount
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */

    public function stripe($totalAmount)
    {
        if (!empty($totalAmount))
        {
            return view('website.stripe.stripe',compact('totalAmount'));
        }else
        {
            return redirect()->back();
        }

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws Stripe\Exception\ApiErrorException
     */
    public function handlePost(Request $request,$totalAmount)
    {
        if(Auth::id()) {
            $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
            $charge = $stripe->charges->create([
                "amount" => $totalAmount * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Making test payment."
            ]);
            $id = Auth::user()->id;
            $carts = Cart::where('user_id', '=', $id)->get();
            foreach ($carts as $cart) {
                $order = new Order();
                $order->name = $cart->name;
                $order->price = $cart->price;
                $order->stock = $cart->stock;
                $order->image = $cart->image;
                $order->payment_status = "Paid";
                $order->delivery_status = "Processing";
                $order->product_id = $cart->product_id;
                $order->user_id = $cart->user_id;
                $order->save();

                $cart_id = $cart->id;
                $data = Cart::find($cart_id);
                $data->delete();
            }
        }
        Session::flash('success', 'Payment has been successfully processed.');

        return back();
    }

    public function viewOrder(){
        if (Auth::id()){
            $user=Auth::user();
            $user_id=$user->id;
//            $orders=Order::where('user_id','=',$user_id)->get();
            return view('website.product.order',['orders'=>Order::where('user_id','=',$user_id)->get()]);
        }
        else{
            return redirect('login');
        }
    }

    public function cancelOrder($id){
        $order=Order::find($id);
        $order->delivery_status="You canceled the order";
        $order->save();
        return redirect()->back();
    }
    public function search(Request $request){
        $search=$request->search;
        $products=Product::where('title','LIKE',"%$search")
            ->paginate(10);
        return view('website.welcome',['products'=>$products,
            'comments'=>Comment::orderby('id','desc')->get(),
            'replies'=>Reply::all()]);
    }

}
