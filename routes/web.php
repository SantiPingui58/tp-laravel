<?php

use App\Http\Controllers\StoreController;
use App\Http\Controllers\Auth\AuthController;
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

Route::get('/auth/check', [AuthController::class, 'check']);
Route::get('/auth/user', [AuthController::class, 'user']);
Route::get('/auth/id', [AuthController::class, 'id']);
Route::get('/auth/logout', [AuthController::class, 'logout']);
Route::get('/auth/login', [AuthController::class, 'login']);


Route::get('store', [StoreController::class, 'index']);
Route::get('store/product/{id}',[StoreController::class, 'view']);
Route::get('store/checkout', [StoreController::class, 'checkout'])->middleware('auth');
Route::get('store/sale', [StoreController::class, 'sale'])->middleware('auth');
Route::get('store/cart/add/{id}', [StoreController::class, 'addToCart'])->middleware('auth');
Route::get('store/cart/remove/{id}', [StoreController::class, 'removeFromCart'])->middleware('auth');

Route::get('store/admin', [StoreController::class, 'admin'])->middleware('auth');
Route::get('store/admin/new', [StoreController::class, 'new'])->middleware('auth');
Route::get('store/admin/product/{id}/edit',[StoreController::class, 'edit'])->middleware('auth');
Route::post('store/admin/product/{id}/update', [StoreController::class, 'update'])->middleware('auth');
Route::post('store/admin/product/{id}/delete', [StoreController::class, 'delete'])->middleware('auth');
Route::post('store/admin/product/create', [StoreController::class, 'create'])->middleware('auth');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
