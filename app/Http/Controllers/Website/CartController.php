<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    /**
     * @param Request $request
     * @param $id
     * @param CartService $cartService
     * @return \Illuminate\Http\RedirectResponse|string
     */
    public function cart(Request $request,$id,CartService $cartService){
        try {
            return $cartService->cart($request,$id);
        }catch (\Exception $exception)
        {
            Log::error($exception);
            return 'Sorry! Something is wrong with this cart!';
        }
    }

    /**
     * @param CartService $cartService
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|string|void
     */
    public function showCart(CartService $cartService){

        try {
            return $cartService->showcart();
        }catch (\Exception $exception)
        {
            Log::error($exception);
            return 'Sorry! Something is wrong with this show cart!';
        }
    }

    /**
     * @param Cart $cart
     * @param CartService $cartService
     * @return \Illuminate\Http\RedirectResponse|string
     */
    public function removeCart(Cart $cart,CartService $cartService)
    {
        try {
            return $cartService->deleteCart($cart);
        }catch (\Exception $exception)
        {
            Log::error($exception);
            return 'Sorry! Something is wrong with this show cart!';
        }
    }

}
