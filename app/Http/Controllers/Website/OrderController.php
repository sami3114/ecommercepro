<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Product;
use App\Models\Reply;
use App\Services\OrderService;
use http\Env;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;



class OrderController extends Controller
{
    /**
     * @param OrderService $orderService
     * @return \Illuminate\Http\RedirectResponse|string|void
     */
    public function orderProduct(OrderService $orderService){
        try {
            return $orderService->orderProduct();
        }catch (\Exception $exception)
        {
            Log::error($exception);
            return 'Sorry! Something is wrong with this Order Product section!';
        }
    }

    /**
     * @param $totalAmount
     * @param OrderService $orderService
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|string
     */

    public function stripe($totalAmount,OrderService $orderService)
    {
        try {
            return $orderService->payment($totalAmount);
        }catch (\Exception $exception)
        {
            Log::error($exception);
            return 'Sorry! Something is wrong with this strape section!';
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws Stripe\Exception\ApiErrorException
     */
    public function handlePost(Request $request,$totalAmount,OrderService $orderService)
    {

        try {
            return $orderService->strapPayment($request,$totalAmount);
        }catch (\Exception $exception)
        {
            Log::error($exception);
            return 'Sorry! Something is wrong with this payment section!';
        }
    }

    public function viewOrder(OrderService $orderService){
        try {
            return $orderService->viewOrder();
        }catch (\Exception $exception)
        {
            Log::error($exception);
            return 'Sorry! Something is wrong with this view order section!';
        }
    }

    public function cancelOrder($id,OrderService $orderService){
        try {
            return $orderService->cancel($id);
        }catch (\Exception $exception)
        {
            Log::error($exception);
            return 'Sorry! Something is wrong with this cancel order section!';
        }
    }
    public function search(Request $request,OrderService $orderService){
        try {
            return $orderService->search($request);
        }catch (\Exception $exception)
        {
            Log::error($exception);
            return 'Sorry! Something is wrong with this view search section!';
        }
    }

}
