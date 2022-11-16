<?php

namespace App\Services;

use App\Http\Requests\ProductRequest;
use App\Http\Traits\UploadImage;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductServices
{
    use UploadImage;
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getProducts()
    {
        return view('admin.product.index',['products'=>Product::all()]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.product.create',['categories'=>Category::all()]);
    }

    /**
     * @param ProductRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProductRequest $request){
        $product=$request->all();
        $product['image']=$this->upload($request,'image','product');
        Product::create($product);
        Alert::success('Product has been added successfully');
        return redirect()->route('list.product');
    }

    /**
     * @param Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Product $product){
        return view('admin.product.update',['product'=>$product,'categories'=>Category::all()]);
    }

    /**
     * @param ProductRequest $request
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateProduct(ProductRequest $request,Product $product)
    {
        $data=$request->all();
        if(!empty($data['image']))
        {
            $data['image']=$this->upload($request,'image','product');
            $product->update($data);
        }
        else{
            $product->update($data);
        }
        Alert::success('Product has been updated successfully');
        return redirect()->route('list.product');
    }

    /**
     * @param Request $request
     * @param $id
     * @param $status
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function productstatus(Request $request,$id,$status){
        $product=Product::find($id);
        if(!empty($product))
        {
            $product->is_active=$status;
            $product->save();
            Alert::success('Product status has been updated successfully');
            return redirect()->route('list.product');
        }
    }

    public function delete(Product $product){
        $product->delete();
        return redirect()->back()->with('message','Category has been delete successfully');
    }

}
