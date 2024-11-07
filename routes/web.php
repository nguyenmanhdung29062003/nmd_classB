<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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
    return response()->json([
        'message' => 'success',
        'data' => 'Hello World',
        'code' => 200
    ]);
});
//index list
Route::get('categories',[CategoryController::class,'index'])->name('category.index');

//create
Route::get('categories/create',[CategoryController::class,'show'])->name('category.createForm');
Route::post('categories/create',[CategoryController::class,'create'])->name('category.create');

//get ra để edit
Route::get('categories/edit/{category}',[CategoryController::class,'edit'])->name('category.edit');

//edit
Route::put('categories/update/{category}',[CategoryController::class,'editDetail'])->name('category.update');

//delete 
Route::get('categories/delete/{category}',[CategoryController::class,'delete'])->name('category.delete');

//searching
Route::get('categories/search',[CategoryController::class,'find'])->name('category.find');