<?php

use App\Http\Controllers\PostController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[\App\Http\Controllers\PostController::class,'index']);
Route::get('/cards',[\App\Http\Controllers\PostController::class,'cards']);

//Route::get('/categories',[\App\Http\Controllers\CategoryController::class,'index'])->name('categories.index');
/*Route::get('/categories/{id}',[\App\Http\Controllers\CategoryController::class,'show']);
Route::get('/categories/create',[\App\Http\Controllers\CategoryController::class,'create']);
Route::get('/categories/{id}/edit',[\App\Http\Controllers\CategoryController::class,'edit']);

Route::post('/categories/store',[\App\Http\Controllers\CategoryController::class,'store']);
Route::put('/categories/{id}/update',[\App\Http\Controllers\CategoryController::class,'update']);
Route::delete('/categories/{id}',[\App\Http\Controllers\CategoryController::class,'destroy']);
*/
Route::resource('categories',\App\Http\Controllers\CategoryController::class);
