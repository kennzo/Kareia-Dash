<?php

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

Route::get('/home', 'HomeController@index');

/**
 * Properties routing group - handling all properties routes (get all, and add them)
 */
Route::group(['prefix' => 'properties'], function() {
    Route::get('/', [
        'as' => 'properties',
        'uses' => 'PropertiesController@index',
    ]);

    Route::get('/create', [
        'as' => 'properties.create',
        'uses' => 'PropertiesController@create',
    ]);

    Route::post('/create', [
        'as' => 'properties.store',
        'uses' => 'PropertiesController@store',
    ]);
});

/**
 * Property group - Handles individual property routes
 */
Route::group(['prefix' => 'property', 'middleware' => 'property'], function() {
    Route::get('/{id}', [
        'as' => 'property',
        'uses' => 'PropertiesController@property',
    ]);
});
