<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\admin\SubCategoriesController;
use App\Http\Controllers\api\ServiceController;
use App\Http\Controllers\AssignedTaskController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UploadAdsController;
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


Route::get('/clear-all', function () {
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:cache');
    Artisan::call('view:clear');
    $homeURL = url('/');
    return 'Views Cleared, Routes Cleared, Cache Cleared, and Config Cleared Successfully ! <a href="' . $homeURL . '">Go Back To Home</a>';
});


// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', function () {
//     return redirect('https://ewdtech.com/ewdtech/test/grobal');
// });

Route::get('/register', function () {
    return redirect('/login');
});

// Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);

Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'namespace' => 'App\Http\Controllers\admin'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('admin');
    Route::get('/logout', [AdminController::class, 'logout'])->name('adminLogout');
    Route::get('/serviceProviders', [AdminController::class, 'manageServiceProvider'])->name('admin.serviceProviders');

});

Auth::routes(['register'=> false]);

Route::group(['prefix' => 'admin' , 'middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('categories', CategoriesController::class);
    Route::resource('sub-categories', SubCategoriesController::class);
    Route::resource('services', ServiceController::class);
    Route::post('/store_banner', [App\Http\Controllers\UploadAdsController::class, 'store'])->name('store_banner');
    Route::get('/add_banner', [App\Http\Controllers\UploadAdsController::class, 'create'])->name('add_banner');

    Route::resource('ads', UploadAdsController::class);
    Route::resource('assign_task', AssignedTaskController::class);

    Route::post('changeTaskStatus', [App\Http\Controllers\AssignedTaskController::class, 'changeStatus'])->name('changeTaskStatus');
    Route::get('/services', [App\Http\Controllers\admin\AdminServiceController::class, 'index'])->name('admin.services');
    Route::match(['get', 'post'], '/update-service', [App\Http\Controllers\admin\AdminServiceController::class, 'changeServiceStatus'])->name('admin.services.update');
});
