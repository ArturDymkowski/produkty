<?php

use App\Http\Controllers\AuthController;
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
    return redirect()->route('products.index');
});

// Auth
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');



// Product
Route::group(['prefix' => 'products', 'as' => 'products'], function(){

    Route::middleware(['auth'])->group(function(){
        Route::any('/create', [ProductController::class, 'create'])->name('.create');
        Route::any('/{product}/edit', [ProductController::class, 'edit'])->name('.edit');
        Route::get('/{product}/delete', [ProductController::class, 'delete'])->name('.delete');
    });

    Route::get('/', [ProductController::class, 'index'])->name('.index');
    Route::get('/{product}', [ProductController::class, 'show'])->name('.show');
});



