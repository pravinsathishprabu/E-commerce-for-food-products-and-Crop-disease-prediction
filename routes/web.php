<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\AuthController as Customer;
use App\Http\Controllers\Customer\CustomerController as CustomerController;
use App\Http\Controllers\Farmer\AuthController as Farmer;
use App\Http\Controllers\Farmer\FarmerController as FarmerController;
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

/*Error Route*/
Route::get('error',function(){
    return view('error');
});

/*Customer Route*/
Route::namespace('customer')->prefix('customer')->name('customer.')->group(function(){
    Route::get('/', function () {
        return view('Customer.index');
    });
    Route::post('/register',[Customer::class,'register']);
    Route::post('/login',[Customer::class,'login']);
    Route::get('/logout',[Customer::class,'logout']);
    Route::get('/home',[CustomerController::class,'getitems']);
    Route::post('/product',[CustomerController::class,'view']);
    Route::post('/cart',[CustomerController::class,'cart']);
    Route::get('/mycart',[CustomerController::class,'mycart']);
    Route::post('/remove',[CustomerController::class,'remove']);
    Route::post('/buy',[CustomerController::class,'buy']);
    Route::post('/payment',[PaymentController::class,'pay']);
});

/*Farmer Route*/
Route::namespace('farmer')->prefix('farmer')->name('farmer.')->group(function(){
    Route::get('/', function () {
        return view('Farmer.index');
    });
    Route::post('/register',[Farmer::class,'register']);
    Route::post('/login',[Farmer::class,'login']);
    Route::get('/logout',[Farmer::class,'logout']);
    Route::get('/add_item',[FarmerController::class,'item']);
    Route::post('/item',[FarmerController::class,'add']);
    Route::get('/home',function(){
        return view('Farmer.home');
    });
    Route::get('/product',[FarmerController::class,'product']);
    Route::post('/stock',[FarmerController::class,'stock']);

});
