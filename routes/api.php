<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('login', 'ApiController@login');
Route::post('signup', 'ApiController@signup');

Route::group(['middleware' => 'auth:api'], function() {
    Route::get('logout', 'ApiController@logout');
    Route::get('user', 'ApiController@user');
    Route::get('books', 'ApiController@books');
    Route::post('add-book', 'ApiController@addBook');
    Route::get('book-details', 'ApiController@showBook');
    Route::get('edit-book', 'ApiController@editBook');
    Route::post('update-book', 'ApiController@updateBook');
    Route::post('delete-book', 'ApiController@deleteBook');
});