<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FrontEndController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\WebController;
use Illuminate\Support\Facades\Auth;
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

// front end website routes
Route::get('/', [WebController::class, 'index']);
Route::get('/AllCategories', [WebController::class, 'showCategories'])->name('web.categories');

// auth routes
Auth::routes();

// user route
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// admin dashboard
Route::middleware(['auth', 'isAdmin'])->group(function () {
    // login as admin and show the dashboard
    Route::get('/dashboard', 'Admin\FrontEndController@index');

    // categories routes
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('/addCategory', [CategoryController::class, 'addCategory']);
    Route::post('/insertCategory', [CategoryController::class, 'storeCategory']);
    Route::get('/editCategory/{id}', [CategoryController::class, 'showEdit']);
    Route::put('/updateCategory/{id}', [CategoryController::class, 'editCategory']);
    Route::post('/deleteCategory/{id}', [CategoryController::class, 'destroyCategory']);

    // products routes
    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/addProduct', [ProductController::class, 'addProduct']);
    Route::post('/insertProduct', [ProductController::class, 'storeProduct']);
    Route::get('/editproduct/{id}', [ProductController::class, 'showEdit']);
    Route::put('/updateProduct/{id}', [ProductController::class, 'editProduct']);
    Route::post('/deleteProduct/{id}', [ProductController::class, 'destroyProduct']);
});