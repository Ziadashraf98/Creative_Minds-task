<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TwilioSMSController;
use App\Http\Middleware\VerificationPhoneNumber;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::controller(AuthController::class)->group(function() {
    
    Route::post('/register', 'register');
    Route::post('/login', 'login');
    Route::get('/user-profile', 'userProfile'); 
    Route::get('/user-verify/{id}', 'verificationUser')->name('verificationUser');
    // Route::post('/refresh', 'refresh');
    // Route::post('/logout', 'logout');
});
