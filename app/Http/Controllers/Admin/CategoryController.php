<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Support\Facades\Log;


class CategoryController extends Controller
{
    /**
     * @param CategoryService $categoryService
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(CategoryService $categoryService)
    {
        try {
            return $categoryService->getCategories();
        }catch (\Exception $exception)
        {
            Log::error($exception);
            return 'Sorry! Something is wrong with this create category!';
        }
    }

    /**
     * @param CategoryRequest $categoryRequest
     * @param CategoryService $categoryService
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CategoryRequest $categoryRequest,CategoryService $categoryService){
        try {
            return $categoryService->store($categoryRequest);
        }catch (\Exception $exception)
        {
            Log::error($exception);
            return 'Sorry! Something is wrong with this store category!';
        }
    }

    /**
     * @param Category $category
     * @param CategoryService $categoryService
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destory(Category $category, CategoryService $categoryService)
    {
        try {
            return $categoryService->delete($category);
        }catch (\Exception $exception)
        {
            Log::error($exception);
            return 'Sorry! Something is wrong with this delete category!';
        }

    }
}
