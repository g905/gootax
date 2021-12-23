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
Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/reviews/create', [App\Http\Controllers\ReviewController::class, "create"])->name("reviews.create");
    Route::post('/reviews', [App\Http\Controllers\ReviewController::class, "save"])->name("reviews.save");
    Route::post('/reviews/author', [App\Http\Controllers\ReviewController::class, "author"])->name("reviews.author");
    Route::get('/reviews-by-author/{id}', [App\Http\Controllers\ReviewController::class, "reviewsByAuthor"])->name("reviews.by.author");
});

Route::get("/test", [App\Http\Controllers\CityController::class, "test"]);

Route::group(['middleware' => ['auth']], function () {
    Route::get('/email/verify', 'VerificationController@show')->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', 'VerificationController@verify')->name('verification.verify')->middleware(['signed']);
    Route::post('/email/resend', 'VerificationController@resend')->name('verification.resend');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
