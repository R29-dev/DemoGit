<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\MailController;
use Illuminate\Support\Facades\Route;


if(App::environment('production')){
    URL::forceScheme('https');
}
// use Intervention\Image\Facades\Image;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/Frontend/app', function () {
    return view('Frontend.layouts.app');
});
Route::get('/Frontend/login', function () {
    return view('Frontend.user.login');
});
Route::get('/Frontend/register', function () {
    return view('Frontend.user.register');
    
});

// Route::get('/Frontend/blog', function () {
//     return view('Frontend.user.blog');
    
// });
Route::get('/Frontend/blog/{{id}}', function () {
    return view('Frontend.user.blog-detail');
    
});
Route::get('/', function () {
    return redirect('/Frontend/index');
});

Route::get('/Frontend/index', [App\Http\Controllers\Frontend\UserController::class, 'index'])->name("index");
Route::post('/Frontend/register', [App\Http\Controllers\Frontend\UserController::class, 'create'])->name("rg");
Route::post('/Frontend/login', [App\Http\Controllers\Frontend\UserController::class, 'login'])->name("logins");
Route::get('/Frontend/logout', [App\Http\Controllers\Frontend\UserController::class, 'logout'])->name("logouts");








Route::get('/Frontend/blog', [App\Http\Controllers\Frontend\BlogController::class, 'index']);
Route::get('/Frontend/blog/{id}', [App\Http\Controllers\Frontend\BlogController::class, 'blog_detail']);
Route::post('/Frontend/blog/rate', [App\Http\Controllers\Frontend\BlogController::class, 'rate'])->name("rate");
Route::get('/Frontend/blog/getRate', [App\Http\Controllers\Frontend\BlogController::class, 'getrate'])->name("getRate");
//blog comment
Route::post('/Frontend/blog/BlogComment', [App\Http\Controllers\Frontend\BlogController::class, 'blog_comment'])->name("cmt");








Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/admin/update', [App\Http\Controllers\Admin\UserController::class, 'update']);








Route::get('/Frontend/account/profile', [App\Http\Controllers\Frontend\MemberController::class, 'index']);
Route::post('/Frontend/account/profile', [App\Http\Controllers\Frontend\MemberController::class, 'update']);




Route::get('/Frontend/account/my-product', [App\Http\Controllers\Frontend\ProductController::class, 'index']);
Route::get('/Frontend/account/add', [App\Http\Controllers\Frontend\ProductController::class, 'create']);
Route::post('/Frontend/account/add', [App\Http\Controllers\Frontend\ProductController::class, 'store']);


Route::get('/Frontend/account/edit/{id}', [App\Http\Controllers\Frontend\ProductController::class, 'edit']);
Route::post('/Frontend/account/edit/{id}', [App\Http\Controllers\Frontend\ProductController::class, 'update']);
Route::get('Frontend/account/delete/{id}', [App\Http\Controllers\Frontend\ProductController::class, 'destroy']);


Route::get('/search', [App\Http\Controllers\Frontend\ProductController::class, 'search'])->name('search');
Route::get('/search-advanced', [App\Http\Controllers\Frontend\ProductController::class, 'searchadvanced'])->name('searchadvanced');

Route::get('/searchprice', [App\Http\Controllers\Frontend\ProductController::class, 'searchprice'])->name('searchprice');

Route::get('Frontend/account/my-product-detail', [App\Http\Controllers\Frontend\ProductController::class, 'getproductdetail']);


Route::post('Frontend/cart/addtocart', [App\Http\Controllers\Frontend\CartController::class, 'addtocart'])->name('addtocart');


Route::get('Frontend/cart', [App\Http\Controllers\Frontend\CartController::class, 'index'])->name('cart');
Route::post('Frontend/cart/update', [App\Http\Controllers\Frontend\CartController::class, 'update'])->name('updatecart');

Route::post('Frontend/cart/delete', [App\Http\Controllers\Frontend\CartController::class, 'deleteProduct'])->name('deleteproduct');
Route::get('Frontend/cart/checkout', [App\Http\Controllers\Frontend\CartController::class, 'checkout'])->name('checkout');


Route::get('/test',[MailController::class, 'index'])->name('test');













Auth::routes();

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard.index');
});
route:: get('/admin/formbasic', function(){
    return view('admin.country.formbasic');
});
// route:: get('/admin/country', function(){
//     return view('admin.country.list');
// });
Route::get('/admin/country', [App\Http\Controllers\Admin\CountryController::class, 'show']);


// Route::get('/admin/profile', function () {
//     return view('admin.user.pages-profile');
// });
Route::get('/admin/country/add', [App\Http\Controllers\Admin\CountryController::class, 'form']);
Route::post('/admin/country/add', [App\Http\Controllers\Admin\CountryController::class, 'create']);
Route::get('/admin/country/edit/{id}', [App\Http\Controllers\Admin\CountryController::class, 'getupdate']);
Route::post('/admin/country/edit/{id}', [App\Http\Controllers\Admin\CountryController::class, 'update']);
Route::get('/admin/country/delete/{id}', [App\Http\Controllers\Admin\CountryController::class, 'destroy']);
Route::get('/admin/edit', [App\Http\Controllers\Admin\CountryController::class, 'edit']);



Route::get('/admin/category', [App\Http\Controllers\Admin\CategoryController::class, 'index']);
Route::get('/admin/category/add', [App\Http\Controllers\Admin\CategoryController::class, 'getadd']);
Route::post('/admin/category/add', [App\Http\Controllers\Admin\CategoryController::class, 'postadd']);
Route::get('/admin/category/edit/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'getupdate']);
Route::post('/admin/category/edit/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'postupdate']);
Route::get('/admin/category/delete/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy']);



Route::get('/admin/brand', [App\Http\Controllers\Admin\BrandController::class, 'index']);
Route::get('/admin/brand/add', [App\Http\Controllers\Admin\BrandController::class, 'getadd']);
Route::post('/admin/brand/add', [App\Http\Controllers\Admin\BrandController::class, 'postadd']);
Route::get('/admin/brand/edit/{id}', [App\Http\Controllers\Admin\BrandController::class, 'getupdate']);
Route::post('/admin/brand/edit/{id}', [App\Http\Controllers\Admin\BrandController::class, 'postupdate']);
Route::get('/admin/brand/delete/{id}', [App\Http\Controllers\Admin\BrandController::class, 'destroy']);










Route::get('/admin/blog', [App\Http\Controllers\Admin\BlogController::class, 'index']);
Route::get('/admin/blog/add', [App\Http\Controllers\Admin\BlogController::class, 'getadd']);
Route::post('/admin/blog/add', [App\Http\Controllers\Admin\BlogController::class, 'create']);
Route::get('/admin/blog/edit/{id}', [App\Http\Controllers\Admin\BlogController::class, 'getupdate']);
Route::post('/admin/blog/edit/{id}', [App\Http\Controllers\Admin\BlogController::class, 'update']);
Route::get('/admin/blog/delete/{id}', [App\Http\Controllers\Admin\BlogController::class, 'destroy']);



Route::get('/admin/profile', [App\Http\Controllers\Admin\UserController::class, 'show']);
Route::post('/admin/profile', [App\Http\Controllers\Admin\UserController::class, 'update']);
























// Route::get('/test-image', function () {
//     $image = Image::make(public_path(''));
//     return $image->response();
// });