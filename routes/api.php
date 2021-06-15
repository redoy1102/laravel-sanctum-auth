<?php

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

//public route
Route::post('/register',[\App\Http\Controllers\AuthController::class,'register']);
Route::post('/login',[\App\Http\Controllers\AuthController::class,'login']);

Route::get('/products', [\App\Http\Controllers\ProductController::class,'index']);
Route::get('/products/{id}',[\App\Http\Controllers\ProductController::class,'show']);
Route::get('/products/search/{name}', [\App\Http\Controllers\ProductController::class,'search']);


//private route
Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::post('/logout',[\App\Http\Controllers\AuthController::class,'logout']);
    Route::post('/products',[\App\Http\Controllers\ProductController::class,'store']);
    Route::put('/products/{id}',[\App\Http\Controllers\ProductController::class,'update']);
    Route::delete('/products/{id}',[\App\Http\Controllers\ProductController::class,'destroy']);
});



//Route::get('/products', [\App\Http\Controllers\ProductController::class,'index']);
//Route::post('/products',[\App\Http\Controllers\ProductController::class,'store']);





Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
