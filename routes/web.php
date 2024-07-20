<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
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

// Route::get('/', function () {
//     return view('pages.home');
// });
Route::get('/',[PostController::class , 'index' ])->name('post.index');
// Route::get('/category/{id}',[PostController::class , 'Category' ])->name('post.category');
Route::get('/tintuc' , [PostController::class , 'categoryALl'])->name('category.showAll');
Route::get('/tintuc/{slug}', [PostController::class, 'category'])->name('category.show');
Route::get('/title/{id}', [PostController::class, 'titleshow'])->name('title.show');
Route::get('/search', [PostController::class, 'search'])->name('search');




