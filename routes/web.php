<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AdminServiceController;
use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\admin\SubCategoriesController;
use App\Http\Controllers\api\ServiceController;
use App\Http\Controllers\UserController;
use App\Models\SubCategories;
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
// Route::get('/', function () {
//     return redirect('https://ewdtech.com/ewdtech/test/grobal');
// });

Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);

Route::group(['prefix' => 'admin','middleware' => 'auth', 'namespace' => 'App\Http\Controllers\admin'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    Route::get('/logout', [AdminController::class, 'logout'])->name('adminLogout');
    Route::get('/serviceProviders', [AdminController::class, 'manageServiceProvider'])->name('admin.serviceProviders');

});
Route::group(['prefix' => 'admin'], function () {
    Auth::routes();
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('categories', CategoriesController::class);
    Route::resource('sub-categories', SubCategoriesController::class);
    Route::resource('services', ServiceController::class);
    Route::get('/services', [App\Http\Controllers\admin\AdminServiceController::class, 'index'])->name('admin.services');
    Route::post('/update-service', [App\Http\Controllers\admin\AdminServiceController::class, 'changeServiceStatus'])->name('admin.services.update');
    
});

