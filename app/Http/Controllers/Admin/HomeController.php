<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\AdminService;
use Illuminate\Support\Facades\Log;


class HomeController extends Controller
{
    /**
     * @param AdminService $adminService
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|string
     */
    public function redirect(AdminService $adminService)
    {
        try {
            return $adminService->redirect();
        }catch (\Exception $exception)
        {
            Log::error($exception);
            return 'Sorry! Something is wrong with this all product!';
        }
    }

}
