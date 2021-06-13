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


// Public Routes
/**
 * Route used in registering a user
 * Data : name, email,password,confirm_password
 */

Route::post('/register',[AuthController::class,'register']);
/**
 * Route Used in Logging USer on the
 * Data : email,password
*/
Route::post('/login',[AuthController::class,'login']);


//Protected Routes
Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::prefix('user')->group(function () {
    /**
     * Fetch User Data
     * Data : USer id on the user table
     */
    Route::get('/{id}',[UserController::class,'show']);
    /**
     * Route Updates User Data
     * Data : USer id on the user table
     */
    Route::put('/{id}',[UserController::class,'update']);
    /**
     * Route Deletes User Data
     * Data : USer id on the user table
     */
    Route::delete('/{id}',[UserController::class,'destroy']);
    });



    /**
     * Route Deletes user authentication used to login
     * Data : USer id on the user table
     */
    Route::post('logout',[AuthController::class,'logout']);

});
//
/**
 * this function is called when the api route called does not exist
 */
Route::fallback(function(){
    return response([
        'message' => 'route not found',
        'success' =>false
    ],404);
    });

