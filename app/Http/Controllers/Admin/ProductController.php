<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Traits\UploadImage;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    use UploadImage;
    public function index(){
        return view('admin.product.index',['products'=>Product::all()]);
    }
    public function create(){
        $categories=Category::all();
        return view('admin.product.create',compact('categories'));
    }

    public function store(ProductRequest $request){
        $product=$request->all();
        $product['image']=$this->upload($request,'image','product');
        Product::create($product);
        return redirect()->route('list.product')->with('message','Product has been added successfully');
    }

    public function edit(Product $product){
        return view('admin.product.update',['product'=>$product,'categories'=>Category::all()]);
    }

    public function update(ProductRequest $request, Product $product){
        $data=$request->all();
        if(!empty($data['image']))
        {
            $data['image']=$this->upload($request,'image','product');
            $product->update($data);
        }
        else{
            $product->update($data);
        }

        return redirect()->route('list.product')->with('message','Product has been updated successfully');
    }

    public function changeProductStatus(Request $request,$id,$status=1)
    {
        $product=Product::find($id);
        if(!empty($product))
        {
            $product->is_active=$status;
            $product->save();
            return redirect()->route('list.product')->with('message','Product has been updated successfully');
        }
    }

    public function destory(Product $product)
    {
        $product->delete();
        return redirect()->back()->with('message','Product has been delete successfully');
    }
}
