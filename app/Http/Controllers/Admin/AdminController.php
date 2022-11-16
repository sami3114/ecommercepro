<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
//use http\Client\Curl\User;
use Illuminate\Http\Request;
use PDF;
use Notification;
use App\Notifications\SendEmailNotification;

class AdminController extends Controller
{
    /**
     * @return void
     */
    public function order(){
        return view('admin.order.index',['orders'=>Order::all()]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delivered($id){
        $order=Order::find($id);
        $order->delivery_status="delivered";
        $order->save();
        return redirect()->back();
    }

    /**
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function print_pdf($id){
        $order=Order::find($id);
        $orders=Order::all()->where('id',$id);
        return view('admin.pdf',compact('order','orders'));
//        $pdf = PDF::loadView('admin.pdf',['order'=>Order::find($id)])->setOptions(['defaultFont' => 'sans-serif']);
//        return $pdf->download('oder_detail.pdf');
    }

    public function send_email($id){
        return view('admin.email.email',['order'=>Order::find($id)]);
    }

    public function send_email_user(Request $request, $id){
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
        return redirect()->back();
    }
}
