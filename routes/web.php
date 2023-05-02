<?php

use App\Http\Controllers\cv\cv_controller;
use App\Http\Controllers\cv_controller1;
use Illuminate\Support\Facades\Route;
use App\Models\Cv;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('master', function(){ 
    return view('layouts/masterPage');
});


/* Route::get('cvs', [cv_controller::class,'index']);
Route::get('cvs/create', [cv_controller::class,'create']);
Route::post('cvs/store', [cv_controller::class,'store']);
Route::get('cvs/{id}/details', [cv_controller::class,'details']);
Route::get('cvs/{id}/edit', [cv_controller::class,'edit']);
Route::put('cvs/{id}', [cv_controller::class,'update']);
Route::delete('cvs/{id}', [cv_controller::class,'destroy']);

//test Vue js
Route::get('/getcv/{id}', [cv_controller::class,'getcv']);

Route::get('cv/create',[cv_controller1::class,'create']);
Route::post('cv/store', [cv_controller1::class,'store']); */

//Route::get('cv/{title}',[cv_controller1::class,'create_Cv'])->name('cret');
    //Route::get('cv/create/{title}',[cv_controller1::class,'form_cv'])->name('create');

//Route::post('/cv/create/store', [cv_controller1::class, 'store_Cv'])->middleware('auth');

Route::group(['middleware' => 'auth'], function(){
    Route::get('cv/Home',[cv_controller1::class,'home'])->name('home');
    Route::get('cv/cv_templet1',[cv_controller1::class,'cv_templet1']);
    Route::get('cv/cv_templet2',[cv_controller1::class,'cv_templet2']);
    Route::get('cv/test',[cv_controller1::class,'test']);
    Route::get('cv/test2',[cv_controller1::class,'test2']);
    Route::post('cv/create',[cv_controller1::class,'create_Cv']);
    Route::get('cv/create/title',[cv_controller1::class,'form_cv'])->name('create');
    Route::post('cv/create/store',[cv_controller1::class,'store_Cv'])->name('store');
    //Route::post('cv/create',[cv_controller1::class,'create_Cv']);
    //Route::match(['get', 'post'],'/cv/create/store', [cv_controller1::class, 'store_Cv']);
    Route::get('cv/profile', [cv_controller1::class,'profile']);
    Route::put('cv/profile/update', [cv_controller1::class,'update']);
    Route::get('cv/download',[cv_controller1::class,'DownPDF'])->name('download');
    Route::get('cv/dashboard',[cv_controller1::class,'dashboard'])->name('dashboard');
});
