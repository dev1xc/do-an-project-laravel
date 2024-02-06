<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\RateController;
use App\Http\Controllers\UserBlogController;
use App\Http\Controllers\UserFrontendController;
use App\Http\Controllers\UserProductController;
use App\Mail\HelloMail;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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
Route::get('/notAdmin', function () {
    return view('admin.notAdmin');
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
    $data = Product::orderBy('created_at', 'desc')->paginate(6);
    return view('frontend.layouts.index', compact('data'));
});
//ddang nhap dang ki
Route::get('/sign-up', [UserFrontendController::class, 'index']);
Route::post('/sign-up', [UserFrontendController::class, 'signup']);
Route::get('/sign-in', [UserFrontendController::class, 'index2']);
Route::post('/sign-in', [UserFrontendController::class, 'signin']);
Route::get('/logout', [UserFrontendController::class, 'logout']);

//blog user
Route::get('/list-blog', [UserBlogController::class, 'index']);
Route::get('/blog-detail/{id}', [UserBlogController::class, 'detailblog']);
Route::post('/blog-detail/{id}', [UserBlogController::class, 'comment']);
Route::get('/get-rate', [UserBlogController::class, 'detailblog']);
Route::get('blog-detail-last/{id}', [UserBlogController::class, 'lastblog']);
Route::get('/blog-detail-next/{id}', [UserBlogController::class, 'nextblog']);

//myaccount user
Route::get('/my-account', [UserFrontendController::class, 'myaccount']);
Route::get('/my-account/update', [UserFrontendController::class, 'updateaccount']);
Route::post('/my-account/update', [UserFrontendController::class, 'updateuser']);

//my product user
Route::get('/my-account/product', [UserProductController::class, 'index']);
Route::get('/my-account/add-product', [UserProductController::class, 'add']);
Route::post('/my-account/add-product', [UserProductController::class, 'create']);
// Route::post('/my-account/add-product', [UserProductController::class, 'create_image']);
Route::get('/my-account/edit/{id}', [UserProductController::class, 'edit']);
Route::post('/my-account/edit/{id}', [UserProductController::class, 'update']);
Route::get('/my-account/delete/{id}', [UserProductController::class, 'delete']);

//detail - product
Route::get('/detail-product/{id}', [UserProductController::class, 'detail']);

//get rate star
Route::get('/get-rate-star', [RateController::class, 'create']);
// Route::post('/get-rate-star',[RateController::class, 'create']);

//get price range
Route::get('/get-price-range', [UserProductController::class, 'getPriceRange']);

//get shop
Route::get('/shop', [UserProductController::class, 'getAllProduct']);
//search
Route::get('/search', [UserProductController::class, 'search']);
Route::get('/search_name', [UserProductController::class, 'search_name']);

//Get sl Cart
Route::get('/get_cart_info', [UserProductController::class, 'slCart']);
Route::get('/get_cart_add', [UserProductController::class, 'addCart']);
Route::get('/get_cart_minus', [UserProductController::class, 'minusCart']);
Route::get('/get_cart_delete', [UserProductController::class, 'deleteCart']);
Route::get('/cart', [UserProductController::class, 'CartPage']);

// Route::get('/cart_total',[CartController::class,'sendMail']);
Route::get('/cart_total', [CartController::class, 'CartCreate']);
Route::post('/cart_total', [CartController::class, 'CartCreate']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Profile route
// Route::get('/profile', [UserController::class, 'index']);
// Route::post('/profile', [UserController::class, 'update']);
Route::group(['middleware' => ['admin']], function () {
    Route::get('/profile', [UserController::class, 'index']);
    Route::post('/profile', [UserController::class, 'update']);
});
// Country route
Route::group(['middleware' => ['admin']], function () {
    Route::get('/country', [CountryController::class, 'index']);
    Route::get('/add-country', [CountryController::class, 'add']);
    Route::post('/add-country', [CountryController::class, 'create']);
    Route::get('/edit-country/{id}', [CountryController::class, 'edit']);
    Route::post('/edit-country/{id}', [CountryController::class, 'update']);
    Route::get('/delete-country/{id}', [CountryController::class, 'delete']);
});


//Blog route
Route::group(['middleware' => ['admin']], function () {
    Route::get('/blog', [BlogController::class, 'index']);
    Route::get('/add-blog', [BlogController::class, 'add']);
    Route::post('/add-blog', [BlogController::class, 'create']);
    Route::get('/edit-blog/{id}', [BlogController::class, 'edit']);
    Route::post('/edit-blog/{id}', [BlogController::class, 'update']);
    Route::get('/delete-blog/{id}', [BlogController::class, 'delete']);
    Route::post('upload_image_ckfinder', [BlogController::class, 'uploadImage'])->name('upload-ckfinder');
    Route::post('save', [BlogController::class, 'store'])->name('store');
});


//Category route
Route::group(['middleware' => ['admin']], function () {
    Route::get('/category', [CategoryController::class, 'index']);
    Route::get('/add-category', [CategoryController::class, 'add']);
    Route::post('/add-category', [CategoryController::class, 'create']);
    Route::get('/edit-category/{id}', [CategoryController::class, 'edit']);
    Route::post('/edit-category/{id}', [CategoryController::class, 'update']);
    Route::get('/delete-category/{id}', [CategoryController::class, 'delete']);
});

//Brand route
Route::group(['middleware' => ['admin']], function () {
    Route::get('/brand', [BrandController::class, 'index']);
    Route::get('/add-brand', [BrandController::class, 'add']);
    Route::post('/add-brand', [BrandController::class, 'create']);
    Route::get('/edit-brand/{id}', [BrandController::class, 'edit']);
    Route::post('/edit-brand/{id}', [BrandController::class, 'update']);
    Route::get('/delete-brand/{id}', [BrandController::class, 'delete']);
});//Payment Cart
Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin_cart', [CartController::class, 'CartAdmin']);
    Route::get('/detail_cart/{id}', [CartController::class, 'CartDetailAdmin']);
});