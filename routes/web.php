<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\TrainController;
use Illuminate\Support\Facades\Route;

Route::get('/user',[AdminController::class,'user']);//veritabanına kullanıcı kaydının dönmei

Route::prefix('admin')->name('admin.')->group(function () {
//    dd("guest");
    Route::middleware('guest')->group(function () {
        Route::get('login', [AdminController::class, 'login'])->name('login');
        Route::post('login', [AdminController::class, 'adminpost'])->name('adminpost');
    });
    Route::middleware('auth')->group(function () {
        Route::get('dashboard',[AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('logout',[AdminController::class, 'logout'])->name('logout');
    });
});
//Category
Route::get('admin/kategoriekle',[AdminController::class,'katekle'])->name('katekle');
Route::get('admin/kategoriliste',[AdminController::class,'katliste'])->name('katliste');
Route::post('admin/kategoristore',[AdminController::class,'store'])->name('store');
Route::get('admin/showcategories',[AdminController::class,'show'])->name('show');
Route::post('admin/update/{id}',[AdminController::class,'update'])->name('update');
Route::get('admin/update/{id}',[AdminController::class,'edit'])->name('edit');
Route::delete('{id}',[AdminController::class,'destroy'])->name('destroy');

//Endpoint
Route::get('admin/endpointstore',[AdminController::class,'endpointstore'])->name('endpointstore');
Route::get('admin/endpointlist',[AdminController::class,'endpointlist'])->name('endpointlist');

//Header-param vs
Route::get('admin/endpointstore/param',[AdminController::class,'endpointstore'])->name('param');



