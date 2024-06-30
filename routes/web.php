<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\categoryController;
use App\Http\Controllers\admin\CustomerController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ProviderController;
use App\Http\Controllers\admin\ExportCartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\ImportCartController;
use App\Http\Controllers\chitiethoadonsController;
use App\Http\Controllers\chuyenmucsController;
use App\Http\Controllers\hoadonnhapsController;
use App\Http\Controllers\hoadonsController;
use App\Http\Controllers\khachhangController;
use App\Http\Controllers\loaitaikhoanController;
use App\Http\Controllers\nhaphanphoisController;
use App\Http\Controllers\sanphams_nhaphanphoisController;
use App\Http\Controllers\sizeController;
use App\Http\Controllers\taikhoanController;
use App\Http\Controllers\user\CartController;
use App\Http\Controllers\user\categoryController as UserCategoryController;
use App\Http\Controllers\user\DetailCotroller;
use App\Http\Controllers\user\HomeController;
use App\Http\Controllers\user\RegistryController;
use App\Http\Controllers\user\HistoryController;
use App\Http\Controllers\user\LoginController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');

    Route::resource('category',categoryController::class);
    Route::resource('customer',CustomerController::class);
    Route::resource('product',ProductController::class);
    Route::resource('provider',ProviderController::class);
    Route::resource('exportcart',ExportCartController::class);
    Route::resource('importcart',ImportCartController::class);
});

Route::group(['prefix' => 'user'], function () {
    // Route::get('/', [UserController::class, 'index'])->name('user.index');
    Route::get('/home',[HomeController::class,'index'])->name('user.home');
    Route::get('/detail',[HomeController::class,'getDetail'])->name('user.detail');
    // Route::get('/cart',[HomeController::class,'getCart'])->name('user.cart');
    Route::get('/category',[HomeController::class,'getCategory'])->name('user.category');
    Route::get('/search',[HomeController::class,'getProductSearch'])->name('user.search');
    
    Route::resource('cart',CartController::class);
    // Thêm route cho phương thức POST
    Route::post('/cart/create', [CartController::class, 'create'])->name('cart.create');
    Route::resource('history',HistoryController::class);
});
Route::get('/',[HomeController::class,'getLogin'])->name('user.login');
Route::resource('registry',RegistryController::class);
Route::resource('login',LoginController::class);
Route::resource('detail',DetailCotroller::class);




