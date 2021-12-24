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
    Route::get('/reviews/create', [Modules\Review\Http\Controllers\ReviewController::class, "create"])->name("reviews.create.ajax");
    Route::get('/reviews/delete/{id}', [Modules\Review\Http\Controllers\ReviewController::class, "destroy"])->name("reviews.delete");
    Route::post('/reviews/edit', [Modules\Review\Http\Controllers\ReviewController::class, "edit"])->name("reviews.edit");
    Route::post('/reviews/update', [Modules\Review\Http\Controllers\ReviewController::class, "update"])->name("reviews.update");
    //Route::post('/reviews/create', [Modules\Review\Http\Controllers\ReviewController::class, "create"])->name("reviews.create");
    Route::post('/reviews', [Modules\Review\Http\Controllers\ReviewController::class, "store"])->name("reviews.store");
    Route::post('/reviews/author', [Modules\Review\Http\Controllers\ReviewController::class, "author"])->name("reviews.author");
    Route::get('/reviews-by-author/{id}', [Modules\Review\Http\Controllers\ReviewController::class, "reviewsByAuthor"])->name("reviews.by.author");
});
