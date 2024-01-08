<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

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




Route::get('/admin/blog', [App\Http\Controllers\Admin\BlogController::class, 'index']);
Route::get('/admin/blog/add', [App\Http\Controllers\Admin\BlogController::class, 'getadd']);
Route::post('/admin/blog/add', [App\Http\Controllers\Admin\BlogController::class, 'create']);
Route::get('/admin/blog/edit/{id}', [App\Http\Controllers\Admin\BlogController::class, 'getupdate']);
Route::post('/admin/blog/edit/{id}', [App\Http\Controllers\Admin\BlogController::class, 'update']);
Route::get('/admin/blog/delete/{id}', [App\Http\Controllers\Admin\BlogController::class, 'destroy']);












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

Route::post('/Frontend/register', [App\Http\Controllers\Frontend\UserController::class, 'create']);
Route::post('/Frontend/login', [App\Http\Controllers\Frontend\UserController::class, 'login']);





Route::get('/Frontend/blog', [App\Http\Controllers\Frontend\BlogController::class, 'index']);
Route::get('/Frontend/blog/{id}', [App\Http\Controllers\Frontend\BlogController::class, 'blog_detail']);
Route::post('/Frontend/blog/rate', [App\Http\Controllers\Frontend\BlogController::class, 'create'])->name("rate");
Route::get('/Frontend/blog/getRate', [App\Http\Controllers\Frontend\BlogController::class, 'getrate'])->name("getRate");








Route::get('/admin/profile', [App\Http\Controllers\Admin\UserController::class, 'show']);
Route::post('/admin/profile', [App\Http\Controllers\Admin\UserController::class, 'update']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/admin/update', [App\Http\Controllers\Admin\UserController::class, 'update']);

