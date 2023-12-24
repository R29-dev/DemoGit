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




Route::get('/admin/blog', [App\Http\Controllers\Admin\BlogController::class, 'index']);
Route::get('/admin/blog/add', [App\Http\Controllers\Admin\BlogController::class, 'getadd']);
Route::post('/admin/blog/add', [App\Http\Controllers\Admin\BlogController::class, 'create']);
Route::get('/admin/blog/edit/{id}', [App\Http\Controllers\Admin\BlogController::class, 'getupdate']);
Route::post('/admin/blog/edit/{id}', [App\Http\Controllers\Admin\BlogController::class, 'update']);
Route::get('/admin/blog/delete/{id}', [App\Http\Controllers\Admin\BlogController::class, 'destroy']);











Route::get('/admin/profile', [App\Http\Controllers\Admin\UserController::class, 'show']);
Route::post('/admin/profile', [App\Http\Controllers\Admin\UserController::class, 'update']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/admin/update', [App\Http\Controllers\Admin\UserController::class, 'update']);

