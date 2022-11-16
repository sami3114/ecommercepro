<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\CommonService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use PDF;



class AdminController extends Controller
{
    /**
     * @param CommonService $commonService
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|string
     */
    public function order(CommonService $commonService){
        try {
            return $commonService->allOrders();
        }catch (\Exception $exception)
        {
            Log::error($exception);
            return 'Sorry! Something is wrong with this order section!';
        }
    }

    /**
     * @param $id
     * @param CommonService $commonService
     * @return \Illuminate\Http\RedirectResponse|string
     */
    public function delivered($id,CommonService $commonService)
    {
        try {
            return $commonService->delivered($id);
        }catch (\Exception $exception)
        {
            Log::error($exception);
            return 'Sorry! Something is wrong with this delivered section!';
        }
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

    /**
     * @param $id
     * @param CommonService $commonService
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|string
     */
    public function send_email($id,CommonService $commonService){
        try {
            return $commonService->email($id);
        }catch (\Exception $exception)
        {
            Log::error($exception);
            return 'Sorry! Something is wrong with this send email section!';
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @param CommonService $commonService
     * @return \Illuminate\Http\RedirectResponse|string
     */
    public function send_email_user(Request $request, $id,CommonService $commonService)
    {
        try {
            return $commonService->sendEmail($request,$id);
        }catch (\Exception $exception)
        {
            Log::error($exception);
            return 'Sorry! Something is wrong with this send email user section!';
        }
    }
}
