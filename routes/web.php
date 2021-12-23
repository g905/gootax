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

Route::get('/laravel', function () {
    return view("welcome");
});

Route::get('/', [App\Http\Controllers\CityController::class, "index"]);
Route::get('/select-city/{city_id?}', [App\Http\Controllers\CityController::class, "selectCity"])->name("select-city");
Route::post('/select-city', [App\Http\Controllers\CityController::class, "selectCityForm"])->name("select-city-form");

Route::get('/reviews', [App\Http\Controllers\ReviewController::class, "index"])->name("reviews");

Route::get("/test", [App\Http\Controllers\CityController::class, "test"]);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
