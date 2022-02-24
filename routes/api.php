<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\TabunganController;

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

//API route for register new user
Route::post('/register', [App\Http\Controllers\API\AuthController::class, 'register']);
//API route for login user
Route::post('/login', [App\Http\Controllers\API\AuthController::class, 'login']);

//Protecting Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });

    // API route for logout user
    Route::post('/logout', [App\Http\Controllers\API\AuthController::class, 'logout']);
});

Route::group(['middleware' => 'api'], function() {

    Route::get('/all-articles',[App\Http\Controllers\ArticlesController::class, 'getAllArticles']);
    Route::get('/get-articles/{id}',[App\Http\Controllers\ArticlesController::class, 'getIdArticles']);
    Route::post('/articles/store',[App\Http\Controllers\ArticlesController::class, 'store']);

    //tabungan
    Route::get('/user-tab',[App\Http\Controllers\API\TabunganController::class, 'get_user']);
    Route::post('/add-user-tab',[App\Http\Controllers\API\TabunganController::class, 'add_user']);


});
