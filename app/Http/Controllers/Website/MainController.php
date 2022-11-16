<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Services\CommonService;
use Illuminate\Support\Facades\Log;

class MainController extends Controller
{

    /**
     * @param CommonService $commonService
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|string
     */
    public function product(CommonService $commonService)
    {
        try {
            return $commonService->allProduct();
        }catch (\Exception $exception)
        {
            Log::error($exception);
            return 'Sorry! Something is wrong with this all product section!';
        }
    }

    /**
     * @param CommonService $commonService
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|string
     */
    public function index(CommonService $commonService){
        try {
            return $commonService->pcrview();
        }catch (\Exception $exception)
        {
            Log::error($exception);
            return 'Sorry! Something is wrong with these product,comment and reply section!';
        }
    }

    /**
     * @param $id
     * @param CommonService $commonService
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|string
     */
    public function detail($id,CommonService $commonService)
    {
        try {
            return $commonService->detailProduct($id);
        }catch (\Exception $exception)
        {
            Log::error($exception);
            return 'Sorry! Something is wrong with this detail product section!';
        }
    }
}
