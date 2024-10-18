<?php

use App\Http\Controllers\ProductController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/products', [ProductController::class, 'store']);
Route::put('/products/{product}',[ProductController::class,'updateProduct']);
Route::get('/getproducts/{product?}',[ProductController::class,'show']);
Route::delete('/getproducts/{product}',[ProductController::class,'softdelete']);
Route::post('/products/restore/{id}', [ProductController::class, 'restore']);
