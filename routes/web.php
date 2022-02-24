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



//tabungan
Route::get('/tabungan', [App\Http\Controllers\TabunganController::class, 'index']);
Route::post('/tabungan/import_excel',  [App\Http\Controllers\TabunganController::class,'import_excel']);
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/kirimemail',[App\Http\Controllers\TabunganController::class, 'sendEmail']);

//articles
Route::get('/articles', [App\Http\Controllers\ArticlesController::class, 'index']);
Route::get('/articles/new', [App\Http\Controllers\ArticlesController::class, 'new_article'])->name('articles');

Route::post('/articles/store', [App\Http\Controllers\ArticlesController::class, 'store'])->name('store');
Route::post('/articles/update', [App\Http\Controllers\ArticlesController::class, 'update'])->name('update');
Route::get('/articles/edit/{id}', [App\Http\Controllers\ArticlesController::class, 'edit'])->name('edit');
Route::get('/articles/delete/{id}', [App\Http\Controllers\ArticlesController::class, 'delete'])->name('delete');

