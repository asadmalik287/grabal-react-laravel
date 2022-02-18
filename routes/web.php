<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\UserController;
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

// Route::get('/{any}', function () {
//     return view('welcome');
// })->where('any',".*");

Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);

Route::group(['prefix' => 'admin','middleware' => 'auth', 'namespace' => 'App\Http\Controllers\admin'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    Route::get('/logout', [AdminController::class, 'logout'])->name('adminLogout');

});
Route::group(['prefix' => 'admin'], function () {
    Auth::routes();

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
