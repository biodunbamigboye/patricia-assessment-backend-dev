<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

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

Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);


//Protected Routes
    Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::resource('user', UserController::class)->only([
        'show', 'update','destroy'
    ]);
    Route::post('logout',[AuthController::class,'logout']);

});

Route::fallback(function(){
    return response([
        'message' => 'route not found',
        'success' =>false
    ],404);
    });

