<?php

namespace App\Services;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryService
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getCategories(){
        $categories=Category::all();
        return view('admin.category.index',compact('categories'));
    }

    /**
     * @param CategoryRequest $categoryRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CategoryRequest $categoryRequest){
        $data=$categoryRequest->all();
        $data['slug']=\Str::slug($categoryRequest->category_name);
        Category::create($data);
        Alert::success('Category has been added successfully');
        return redirect()->back();
    }

    /**
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Category $category){
        $category->delete();
        return redirect()->back()->with('message','Category has been delete successfully');
    }
}
