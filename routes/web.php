<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrainController;
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

Route::get('/index',function (){return view('admin');});
Route::get('/admin',function (){return view('master.dashboard');});


//mongodb form route yapıları
Route::get('/create',[TrainController::class,'create']);
Route::post('/add',[TrainController::class,'store'])->name('add');
Route::get('/person',[TrainController::class,'index']);
Route::get('/edit/{id}',[TrainController::class,'edit'])->name('edit');
Route::post('/edit/{id}',[TrainController::class,'update'])->name('update');
Route::delete('/{id}',[TrainController::class,'destroy'])->name('destroy');