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

//CATEGORIEs
Route::get('categories/all', [CategoryController::class, 'index']); //you either use this
Route::post('categories/add', [CategoryController::class, 'store']);
Route::put('categories/update/{category_id}', [CategoryController::class, 'update']);
//CATEGORIES Routes
// Route::controller(CategoryController::class)->group(function(){ // or this, yaay khool (old methode)
//     //Route::get('/departments/all', 'index');
//     Route::get('/categories/all', 'index');
// });
