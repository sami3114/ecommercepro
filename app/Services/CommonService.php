<?php

namespace App\Services;

use App\Models\Comment;
use App\Models\Order;
use App\Models\Product;
use App\Models\Reply;
use App\Models\User;
use App\Notifications\SendEmailNotification;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Notification;

class CommonService
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function allOrders()
    {
        return view('admin.order.index',['orders'=>Order::all()]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function allProduct()
    {
        return view('website.product.index',
            ['products'=>Product::paginate(10)]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delivered($id){
        $order=Order::find($id);
        $order->delivery_status="delivered";
        $order->save();
        Alert::success('Order delivered');
        return redirect()->back();
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function email($id)
    {
        return view('admin.email.email',['order'=>Order::find($id)]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendEmail(Request $request,$id)
    {
        $order=Order::find($id);
        $user=User::find($order->user_id);
        $details=[
            'greeting'=>$request->greeting,
            'firstline'=>$request->firstline,
            'body'=>$request->body,
            'button'=>$request->button,
            'url'=>$request->url,
            'lastline'=>$request->lastline,
        ];
        Notification::sendNow($user,new SendEmailNotification($details));
        Alert::success('Email has been sent successfully');
        return redirect()->back();
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function pcrview()
    {
        return view('website.welcome',
            ['products'=>Product::paginate(10),
                'comments'=>Comment::orderby('id','desc')->get(),
                'replies'=>Reply::all()]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function detailProduct($id){
        return view('website.product.detail',
            ['product'=>Product::find($id)]);
    }
}
