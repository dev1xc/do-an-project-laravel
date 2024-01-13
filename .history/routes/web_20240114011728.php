<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\UserBlogController;
use App\Http\Controllers\UserFrontendController;
use App\Http\Controllers\UserProductController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/main', function () {
    return view('admin.dashboard');
});
Route::get('/dashboard', function () {
    return view('admin.dashboard');
});
Route::get('/test', function () {
    return view('ckeditor');
});
Route::get('/home-page', function () {
    return view('frontend.layouts.index');
});
//ddang nhap dang ki
Route::get('/sign-up', [UserFrontendController::class,'index']);
Route::post('/sign-up', [UserFrontendController::class,'signup']);
Route::get('/sign-in', [UserFrontendController::class,'index2']);
Route::post('/sign-in', [UserFrontendController::class,'signin']);
Route::get('/logout', [UserFrontendController::class,'logout']);

//blog user
Route::get('/list-blog', [UserBlogController::class,'index']);
Route::get('/blog-detail/{id}', [UserBlogController::class,'detailblog']);
Route::get('/get-rate', [UserBlogController::class,'detailblog']);

//myaccount user
Route::get('/my-account', [UserFrontendController::class,'myaccount']);
Route::get('/my-account/update', [UserFrontendController::class,'updateaccount']);
Route::post('/my-account/update', [UserFrontendController::class,'updateuser']);

//my product user
Route::get('/my-account/product', [UserProductController::class,'index']);
Route::get('/my-account/add-product', [UserProductController::class,'add']);
Route::post('/my-account/add-product', [UserProductController::class,'create']);
Route::get('/my-account/edit/{id}', [UserProductController::class,'edit']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Profile route
Route::get('/profile', [UserController::class, 'index']);
Route::post('/profile', [UserController::class, 'update']);

// Country route
Route::get('/country', [CountryController::class, 'index']);
Route::get('/add-country', [CountryController::class, 'add']);
Route::post('/add-country', [CountryController::class, 'create']);
Route::get('/edit-country/{id}', [CountryController::class, 'edit']);
Route::post('/edit-country/{id}', [CountryController::class, 'update']);
Route::get('/delete-country/{id}', [CountryController::class, 'delete']);

//Blog route
Route::get('/blog', [BlogController::class, 'index']);
Route::get('/add-blog', [BlogController::class, 'add']);
Route::post('/add-blog', [BlogController::class, 'create']);
Route::get('/edit-blog/{id}', [BlogController::class, 'edit']);
Route::post('/edit-blog/{id}', [BlogController::class, 'update']);
Route::get('/delete-blog/{id}', [BlogController::class, 'delete']);
Route::post('upload_image_ckfinder', [BlogController::class, 'uploadImage'])->name('upload-ckfinder');
Route::post('save', [BlogController::class, 'store'])->name('store');


//Category route
Route::get('/category', [CategoryController::class,'index']);
Route::get('/add-category', [CategoryController::class,'add']);
Route::post('/add-category', [CategoryController::class,'create']);
Route::get('/edit-category/{id}', [CategoryController::class, 'edit']);
