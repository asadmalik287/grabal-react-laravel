<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\api\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['namespace' => 'App\Http\Controllers\api'], function () {
    // auth routes
    Route::post('register', 'AuthController@register')->name('register');
    Route::post('serviceProviderRegister', 'AuthController@serviceProviderRegister')->name('serviceProviderRegister');
    Route::post('login', 'AuthController@login')->name('login');
    Route::get('all-services', 'ServiceController@allServices')->name('allServices');
    Route::get('service-detail', 'ServiceController@serviceDetail')->name('serviceDetail');
    Route::get('seller-detail', 'ServiceController@sellerDetail')->name('sellerDetail');
    Route::get('seller-services', 'ServiceController@sellerServices')->name('serviceDetail');
    Route::get('AllServiceProviders', 'ServiceController@getAllServiceProviders')->name('api.AllServiceProviders');
    Route::post('save-service-image', 'ServiceController@saveServiceImage')->name('api.saveServiceImage');
    // service routes
    Route::post('add-service', 'ServiceController@storeService')->name('storeService');
    Route::post('update-service/{id}', 'ServiceController@updateService')->name('updateService');
    Route::get('category-list', 'ServiceController@categoriesList')->name('category-list');
    Route::get('sub-cat-services', 'ServiceController@getServiceFromSubCategory')->name('sub-cat-services');
    
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('test', 'AuthController@test')->name('test');

    });
});
