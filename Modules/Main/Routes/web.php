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

//Route::prefix('main')->group(function() {
Route::get('/', 'MainController@index')->name("index");
Route::get('/select-city/{city_id?}', 'MainController@selectCity')->name("select-city");
Route::post('/select-city-form', 'MainController@selectCityForm')->name("select-city-form");
Route::get('/guess-city', 'MainController@guessCityByIp')->name("guess-city");
//});
