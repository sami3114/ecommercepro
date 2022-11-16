<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\ProductServices;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{

    /**
     * @param ProductServices $productServices
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(ProductServices $productServices){
        try {
            return $productServices->getProducts();
        }catch (\Exception $exception)
        {
            Log::error($exception);
            return 'Sorry! Something is wrong with this all product!';
        }

    }

    /**
     * @param ProductServices $productServices
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|string
     */
    public function create(ProductServices $productServices){
        try {
            return $productServices->create();
        }catch (\Exception $exception)
        {
            Log::error($exception);
            return 'Sorry! Something is wrong with this create product!';
        }
    }

    /**
     * @param ProductRequest $request
     * @param ProductServices $productServices
     * @return \Illuminate\Http\RedirectResponse|string
     */
    public function store(ProductRequest $request,ProductServices $productServices){
        try {
            return $productServices->store($request);
        }catch (\Exception $exception)
        {
            Log::error($exception);
            return 'Sorry! Something is wrong with this store product!';
        }
    }

    /**
     * @param Product $product
     * @param ProductServices $productServices
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|string
     */
    public function edit(Product $product,ProductServices $productServices){
        try {
            return $productServices->edit($product);
        }catch (\Exception $exception)
        {
            Log::error($exception);
            return 'Sorry! Something is wrong with this edit product!';
        }
    }

    /**
     * @param ProductRequest $request
     * @param Product $product
     * @param ProductServices $productServices
     * @return \Illuminate\Http\RedirectResponse|string
     */
    public function update(ProductRequest $request, Product $product,ProductServices $productServices){
        try {
            return $productServices->updateProduct($request,$product);
        }catch (\Exception $exception)
        {
            Log::error($exception);
            return 'Sorry! Something is wrong with this update product!';
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @param $status
     * @param ProductServices $productServices
     * @return \Illuminate\Http\RedirectResponse|string|void
     */
    public function changeProductStatus(Request $request,$id,$status=1,ProductServices $productServices)
    {
        try {
            return $productServices->productstatus($request,$id,$status);
        }catch (\Exception $exception)
        {
            Log::error($exception);
            return 'Sorry! Something is wrong with this update product!';
        }
    }

    public function destory(Product $product,ProductServices $productServices)
    {
        try {
            return $productServices->delete($product);
        }catch (\Exception $exception)
        {
            Log::error($exception);
            return 'Sorry! Something is wrong with this delete product!';
        }
    }
}
