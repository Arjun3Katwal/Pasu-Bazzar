<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Middleware;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\KhaltiController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
//FrontendController
Route::get('/',[FrontendController::class,'home'])->name('home');
Route::get('/about',[FrontendController::class,'about'])->name('about');
Route::get('/categories/{id}',[FrontendController::class,'categories'])->name('categories');
Route::get('/productsearch',[FrontendController::class,'productsearch'])->name('productsearch');
// Route::get('/details/{id}',[FrontendController::class,'details'])->name('details');
Route::get('/checkout',[FrontendController::class,'checkout'])->name('checkout');
Route::get('/details/{id}',[FrontendController::class,'details'])->name('details');

Route::post('/khalti/payment/verify',[KhaltiController::class,'verifyPayment'])->name('khalti.verifyPayment');

Route::post('/add-rating',[RatingController::class,'add'])->name('add-rating');



//BackendController


//category

Route::get('/createCategory', [App\Http\Controllers\categoryController::class, 'create'])->name('createCategory');
Route::post('/storeCategory', [App\Http\Controllers\categoryController::class, 'store'])->name('storeCategory');
Route::get('/editCategory/{id}', [App\Http\Controllers\categoryController::class, 'edit'])->name('editCategory');
Route::post('/updateCategory/{id}', [App\Http\Controllers\categoryController::class, 'update'])->name('updateCategory');
Route::get('/deleteCategory/{id}', [App\Http\Controllers\categoryController::class, 'delete'])->name('deleteCategory');
Route::get('/viewCategory', [App\Http\Controllers\categoryController::class, 'index'])->name('viewCategory');
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');
Route::get('/viewwishlist', [App\Http\Controllers\WishlistController::class, 'create'])->name('viewwishlist');
Route::get('/removewishlist/{id}', [App\Http\Controllers\WishlistController::class, 'destroy'])->name('removewishlist');

Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/viewcart', [App\Http\Controllers\CartController::class, 'create'])->name('viewcart');
Route::get('/removecart/{id}', [App\Http\Controllers\CartController::class, 'destroy'])->name('removecart');

//Prdoucts
Route::get('/contact',[EmailController::class, 'contact'])->name('contact');
Route::post('/emailstore',[EmailController::class, 'dataSender'])->name('emailstore');

//NewsController
// Route::post('/storeNews',[newsController::class,'storeNews'])->name('storeNews');
// Route::get('/viewNews',[newsController::class,'viewNews'])->name('viewNews');
// Route::post('updateNews/{id}',[newsController::class,'update'])->name('updateNews');
// Route::get('/editNews/{id}',[newsController::class,'edit'])->name('editNews');
// Route::get('delete/{id}',[newsController::class,'delete'])->name('delete');
// Route::get('bcontact',[newsController::class,'contact'])->name('bcontact');
// Route::get('storecontact',[newsController::class,'storecontact'])->name('storecontact');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware'=>['auth', 'isAdmin']], function() {

    Route::get('/Dashboard',[AdminController::class,'home'])->name('Dashboard');
    Route::get('/Users',[AdminController::class,'Users'])->name('Users');
    Route::get('/viewContact',[AdminController::class,'viewContact'])->name('viewContact');
    
    //UserController

Route::get('/viewUser', [App\Http\Controllers\AdminController::class, 'index'])->name('viewUser');

});


Route::group(['middleware'=>['auth', 'isVendor']], function() {

    // Items
Route::get('/viewProduct', [App\Http\Controllers\itemController::class, 'index'])->name('viewProduct');
Route::get('/createProduct', [App\Http\Controllers\itemController::class, 'create'])->name('createProduct');
Route::post('/storeProduct', [App\Http\Controllers\itemController::class, 'store'])->name('storeProduct');
Route::get('/editProduct/{id}', [App\Http\Controllers\itemController::class, 'edit'])->name('editProduct');
Route::post('/updateProduct/{id}', [App\Http\Controllers\itemController::class, 'update'])->name('updateProduct');
Route::get('/deleteProduct/{id}', [App\Http\Controllers\itemController::class, 'delete'])->name('deleteProduct');
Route::get('/showProduct/{id}', [App\Http\Controllers\itemController::class, 'show'])->name('showProduct');
// itemsend
Route::get('/statusproduct/{id}',[App\Http\Controllers\itemController::class,'productstatus'])->name('statusproduct'); 

    Route::get('/vendor',[BackendController::class,'vendor'])->name('vendor');

});