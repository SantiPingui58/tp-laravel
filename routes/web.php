<?php

use App\Http\Controllers\StoreController;
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


Route::get('store', [StoreController::class, 'index']);
Route::get('store/product/{id}',[StoreController::class, 'view']);


Route::get('store/admin', [StoreController::class, 'admin']);
Route::get('store/admin/new', [StoreController::class, 'new']);
Route::get('store/admin/product/{id}/edit',[StoreController::class, 'edit']);
Route::post('store/admin/product/{id}/update', [StoreController::class, 'update']);
Route::post('store/admin/product/{id}/delete', [StoreController::class, 'delete']);
Route::post('store/admin/product/create', [StoreController::class, 'create']);

