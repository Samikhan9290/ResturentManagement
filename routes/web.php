<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomerController;
use App\Http\Controllers\AdminControoler;

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

Route::get('/',[HomerController::class,'index']);
Route::get('/redirects',[HomerController::class,'redirects']);
Route::get('/users',[AdminControoler::class,'users']);
Route::get('/deleteUSer/{id}',[AdminControoler::class,'deleteUSer']);
Route::get('/food',[AdminControoler::class,'food']);
Route::post('/addCart/{id}',[HomerController::class,'addCart']);

Route::get('/showCart/{id}',[HomerController::class,'showCart']);
Route::get('/remove/{id}',[HomerController::class,'remove']);
Route::post('/confirmOrder/{id}',[HomerController::class,'confirmOrder']);

Route::post('/uploadFood',[AdminControoler::class,'uploadFood']);
Route::get('/foodDelete/{id}',[AdminControoler::class,'foodDelete']);
Route::get('/EditFood/{id}',[AdminControoler::class,'EditFood']);
Route::post('/UpdateMenu/{id}',[AdminControoler::class,'UpdateMenu']);



//Route for Chefs
Route::get('/chefs',[AdminControoler::class,'chefs']);
Route::get('/order',[AdminControoler::class,'order']);
Route::get('/search',[AdminControoler::class,'search']);
Route::post('/uploadChef',[AdminControoler::class,'uploadChef']);
Route::post('/reservation',[AdminControoler::class,'reservation']);
Route::get('/viewReservation',[AdminControoler::class,'viewReservation']);
Route::get('/deleteReservation/{id}',[AdminControoler::class,'deleteReservation']);
Route::get('/chefsDelete/{id}',[AdminControoler::class,'chefsDelete']);
Route::get('/EditChef/{id}',[AdminControoler::class,'EditChef']);
Route::post('/updateChef/{id}',[AdminControoler::class,'updateChef']);


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
