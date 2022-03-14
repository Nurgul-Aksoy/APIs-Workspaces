<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrainController;
use App\Http\Controllers\AdminController;
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
/*
Route::get('/index',function (){return view('admin');});
Route::get('/adminlte',function (){return view('master.dashboard');});*/


//mongodb form route yapıları
Route::get('/create',[TrainController::class,'create']);
Route::post('/add',[TrainController::class,'store'])->name('add');
Route::get('/person',[TrainController::class,'index']);
Route::get('/edit/{id}',[TrainController::class,'edit'])->name('edit');
Route::post('/edit/{id}',[TrainController::class,'update'])->name('update');
Route::delete('/{id}',[TrainController::class,'destroy'])->name('destroy');

//admin login işlemleri
/*Route::get('/admin',[AdminController::class,'login']);//admin-login sayfası yönlendirme
Route::post('control',[AdminController::class,'control'])->name('control');
Route::get('/user',[AdminController::class,'user']);*/
Route::get('/control', function () {
    //
})->middleware('auth')->name('control');

//controller'ı route üzerinden tanımlayarak prefix içerisinde yer alan routelar için kolaylık sağlanmıştır.

//login sayfası grubun dışında tanımlanması gerekli
Route::get('login',[AdminController::class,'login'])->name('admin.login');

Route::prefix('admin')->name('admin.')->middleware('admin')->controller(AdminController::class)->group(function(){ //admin üzerinden diğer sayfalar dönecektir
    Route::get('dashboard','dashboard')->name('dashboard');
    Route::get('logout','logout')->name('logout');
});

