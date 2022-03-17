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
//
//Route::prefix('admin')->name('admin.')->controller(AdminController::class)->middleware('auth')->group(function () {
////    dd("auth");
//

//});


