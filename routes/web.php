<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Api\TwilioSMSController;
use App\Http\Controllers\HomeController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix'=>'admin'],function(){

    Auth::routes(['register'=>false]);
});

Route::get('/admin', [HomeController::class, 'index'])->name('admin');

Route::group(['middleware'=>'auth:admin'],function(){
    
    Route::resource('users', UserController::class);
});