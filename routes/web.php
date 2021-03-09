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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/manage', 'ManageCarsController@index')->name('managecars');

Route::get('/manage-carsdetails/{id}', 'ManageCarsController@show');
Route::get('/update-car/{id}', 'ManageCarsController@updatecar');

Route::get('/delete-car/{id}', 'ManageCarsController@delete');

Route::get('/search', 'BrowseController@search');

Route::post('/browse-carsdetails/{id}', 'BuyController@buy');

Route::get('/browse', 'BrowseController@index')->name('browse');

Route::get('/browse-carsdetails/{id}', 'BrowseController@show');

Route::get('/sale', 'SaleController@index')->name('sale');

// Route::get('/sale', 'UploadController@getUploadForm');

Route::post('/sale', 'SaleController@store');

// Route::resource('/sale', 'SaleController');
