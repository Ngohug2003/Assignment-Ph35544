<?php

use App\Http\Controllers\categories\CategoriesController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Client\AuthController;
use App\Http\Controllers\Client\PostController;
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

Route::get('/dang-ky',[AuthController::class , 'showregisterForm'])->name('showRegister');
Route::post('/dang-ky',[AuthController::class , 'register'])->name('register');

Route::get('/dang-nhap',[AuthController::class , 'showLoginForm'])->name('showLogin');
Route::post('/dang-nhap',[AuthController::class , 'login'])->name('login');


Route::post('/logout',[AuthController::class, 'logout'])->name('logout');

Route::get('password/reset', function () {
    return view('auth.passwords.email');
})->name('password.request');

Route::get('/tintuc' , [PostController::class , 'categoryALl'])->name('category.showAll');
Route::get('/tintuc/{slug}', [PostController::class, 'category'])->name('category.show');
Route::get('/title/{id}', [PostController::class, 'titleshow'])->name('title.show');
Route::get('/search', [PostController::class, 'search'])->name('search');


// khu vực admin 
Route::middleware(['is_admin'])->group(function () {

    Route::get('/admin', [CategoriesController::class, 'index'])->name('categories.index');
    Route::get('/admin/categories/create', [CategoriesController::class, 'create'])->name('categories.create');
    Route::post('/admin/categories', [CategoriesController::class, 'store'])->name('categories.store');
    Route::get('/admin/categories/{id}/edit', [CategoriesController::class, 'edit'])->name('categories.edit');
    Route::put('/admin/categories/{id}', [CategoriesController::class, 'update'])->name('categories.update');
    Route::delete('/admin/categories/{id}', [CategoriesController::class, 'destroy'])->name('categories.destroy');
    Route::post('/logout', [CategoriesController::class, 'logout'])->name('logout');
});




