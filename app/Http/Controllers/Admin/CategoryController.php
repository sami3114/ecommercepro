<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;


class CategoryController extends Controller
{
    public function create(){
        $categories=Category::all();
        return view('admin.category.index',compact('categories'));
    }
    public function store(CategoryRequest $categoryRequest){
        $data=$categoryRequest->all();
        $data['slug']=\Str::slug($categoryRequest->category_name);
        Category::create($data);
        return redirect()->back()->with('message','Category has been added successfully');
    }
    public function destory(Category $category)
    {
        $category->delete();
        return redirect()->back()->with('message','Category has been delete successfully');
    }
}
