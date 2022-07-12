<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
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

Route::middleware(['auth', 'role:admin'])->group(function(){
    Route::get('/admin', function(){
        return 'Bonjour Admin';
    });
});

//CATEGORIES
Route::get('categories/all', [CategoryController::class, 'index']);
Route::post('categories/add', [CategoryController::class, 'store']);
Route::put('categories/update/{category_id}', [CategoryController::class, 'update']);
Route::delete('categories/delete/{category_id}', [CategoryController::class, 'destroy']);

//SUB_CATEGORIES
Route::get('subCategories/all', [SubCategoryController::class, 'index']);
Route::post('subCategories/add', [SubCategoryController::class, 'store']);
Route::put('subCategories/update/{subCategory_id}', [SubCategoryController::class, 'update']);
Route::delete('subCategories/delete/{subCategory_id}', [SubCategoryController::class, 'destroy']);
