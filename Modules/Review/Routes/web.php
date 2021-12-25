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

/*
  Route::prefix('review')->group(function() {
  Route::get('/', 'ReviewController@index');
  });
 */
Route::get('/reviews', [Modules\Review\Http\Controllers\ReviewController::class, "index"])->name("reviews");
Route::get('/download/{id}', [Modules\Review\Http\Controllers\ReviewController::class, "download"])->name("download-file");
Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::resource('reviews', ReviewController::class)->except(['index']);
    Route::post('/reviews/author', [Modules\Review\Http\Controllers\ReviewController::class, "author"])->name("reviews.author");
    Route::get('/reviews-by-author/{id}', [Modules\Review\Http\Controllers\ReviewController::class, "reviewsByAuthor"])->name("reviews.by.author");
});
