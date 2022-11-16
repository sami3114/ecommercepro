<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Product;
use App\Models\Reply;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function redirect(){
        $userType=Auth::user()->usertype;
        if($userType==1)
        {
            $orders=Order::all();
            $total_revenue=0;
            foreach ($orders as $order)
            {
                $total_revenue=$total_revenue+$order->price;
            }

            return view('admin.dashboard',
                ['totalProduct'=>Product::all()->count(),
                    'totalOrder'=>Order::all()->count(),
                    'totalUser'=>User::all()->count(),
                    'totalRevenue'=>$total_revenue,
                    'total_delivery'=>Order::where('delivery_status','=','delivered')->get()->count(),
                    'total_processing'=>Order::where('delivery_status','=','Processing')->get()->count(),
                    'total_paid'=>Order::where('payment_status','=','Paid')->get()->count(),
                    'total_cod'=>Order::where('payment_status','=','cash on delivery')->get()->count(),
                    ]);
        }
        else
        {
            return view('website.welcome',['products'=>Product::paginate(10),
                'comments'=>Comment::orderby('id','desc')->get(),
                'replies'=>Reply::all()]);
        }
    }



}
