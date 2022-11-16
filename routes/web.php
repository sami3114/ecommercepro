<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\OrderController;
use App\Http\Controllers\Website\CommentController;
use App\Http\Controllers\Website\CartController;
use App\Http\Controllers\Website\MainController;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['prefix' => '/myadmin','middleware' => ['auth','isAdmin']],function (){
    Route::controller(CategoryController::class)->group(function (){
        Route::get('/category','create')->name('add.category');
        Route::post('/category','store')->name('store.category');
        Route::delete('/delete_category/{category}','destory')->name('delete.category');
    });

    Route::controller(ProductController::class)->group(function (){
        Route::get('/add_product','create')->name('add.product');
        Route::post('/store_product','store')->name('store.product');
        Route::get('list_product','index')->name('list.product');
        Route::get('/edit_product/{product}/edit','edit')->name('edit.product');
        Route::delete('/delete_product/{product}','destory')->name('delete.product');
        Route::post('/update_product/{product}','update')->name('update.product');
        Route::get('/change-product-status/{id}/{status?}','changeProductStatus')->name('change.product.status');

    });

    Route::controller(AdminController::class)->group(function (){
        Route::get('/order','order')->name('order');
        Route::get('/delivered/{id}','delivered')->name('delivered');
        Route::get('/print_pdf/{id}','print_pdf')->name('pdf');
        Route::get('/send_email/{id}','send_email')->name('send.email');
        Route::post('/send_email_user/{id}','send_email_user')->name('send.email.user');
    });

});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/redirect',[\App\Http\Controllers\Admin\HomeController::class,'redirect'])->middleware('auth','verified');

Route::view('/about','website.about.about')->name('about');

Route::controller(MainController::class)->group(function (){
    Route::get('/','index');
    Route::get('/product','product')->name('product');
    Route::get('/detail/{id}','detail')->name('product.detail');
});

Route::controller(CartController::class)->group(function (){
    Route::post('/add_cart/{id}','cart')->name('cart');
    Route::get('/cart_product','showCart')->name('show.cart');
    Route::delete('/delete_cart_product/{cart}','removeCart')->name('delete.cart.product');
});

Route::controller(OrderController::class)->group(function (){
    Route::get('/order_product','orderProduct')->name('order.product');
    Route::get('/order_product/{totalAmount}','stripe')->name('stripe');
    Route::post('/stripe-payment/{totalAmount}','handlePost')->name('stripe.payment');
    Route::get('/view_order', 'viewOrder')->name('view.order');
    Route::get('/search_product', 'search')->name('search.product');
    Route::get('/cancel_order/{id}', 'cancelOrder')->name('cancel.order');
});

Route::controller(CommentController::class)->group(function (){
    Route::post('/add_comment','add_comment')->name('add.comment');
    Route::post('/add_reply','add_reply')->name('add.reply');
});






