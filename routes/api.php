<?php

use App\Http\Controllers\CategoryController;
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


//CATEGORIES Routes
Route::controller(CategoryController::class)->group(function(){
    //Route::get('/departments/all', 'index');
    Route::get('/categories/all', 'categories.index');
});
