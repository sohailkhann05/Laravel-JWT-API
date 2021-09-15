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


Auth::routes();

Route::get('/', 'HomeController@index')->name('index');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', 'HomeController@home');
    Route::get('/dashboard', 'HomeController@home')->name('home');

    /* books Controller */
    Route::get('/books', 'Admin\BooksController@index')->name('books.index');
    Route::get('books/create', 'Admin\BooksController@create')->name('books.create');
    Route::post('books/store', 'Admin\BooksController@store')->name('books.store');
    Route::get('books/{slug}', 'Admin\BooksController@show')->name('books.show');
    Route::get('books/{slug}/edit', 'Admin\BooksController@edit')->name('books.edit');
    Route::post('books/update', 'Admin\BooksController@update')->name('books.update');
    Route::post('books/delete', 'Admin\BooksController@delete')->name('books.delete');
    
});

Route::get('/clear-cache', function () {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Session::flush();
    return redirect('/');
});