<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;

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

Route::get('/',[ContactController::class, 'index']);
Route::post('/confirm',[ContactController::class, 'confirm']);
Route::post('/thanks',[ContactController::class, 'store']);

// Admin認証ルート
Route::middleware('auth')->group(function(){
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/search',[AdminController::class, 'search']);
});
