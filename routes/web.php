<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;



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
Route::get('/userlist',[UserController::class,'index']);
Route::get('/get_employeelist',[UserController::class,'get_employeelist']);
Route::get('contact-form', [ContactController::class,'create']);
Route::post('submit',[ContactController::class,'store']);
Route::get('kyc-form', [ContactController::class,'getkycform']);
Route::post('datasubmit',[ContactController::class,'submit']);
Route::view('getkyc','getkyc');
Route::get('getkyc', [ContactController::class,'getkycdata']);
Route::get('user/{id}/edit', [ContactController::class,'getindividualdata']);
Route::post('user/update', [ContactController::class,'update']);
Route::resource('products', ProductController::class);



//Route::get('user/update', [ContactController::class,'update']);






