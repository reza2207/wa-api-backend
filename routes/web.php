<?php

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
    return view('welcome');
});

Route::get('/home', function () {
    return view('welcome');
});


Route::get('/articles', [App\Http\Controllers\ArticlesController::class, 'index'])->name('articles');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/articles/new', [App\Http\Controllers\ArticlesController::class, 'new_article'])->name('articles');
Auth::routes();

Route::post('/articles/store', [App\Http\Controllers\ArticlesController::class, 'store'])->name('store');
Route::post('/articles/update', [App\Http\Controllers\ArticlesController::class, 'update'])->name('update');
Route::get('/articles/edit/{id}', [App\Http\Controllers\ArticlesController::class, 'edit'])->name('edit');
Route::get('/articles/delete/{id}', [App\Http\Controllers\ArticlesController::class, 'delete'])->name('delete');