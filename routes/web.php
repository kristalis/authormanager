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
Route::get('/verify-user/{code}', 'Auth\RegisterController@activateUser')->name('activate.user');

Route::get('chapters/{slug}','ChapterController@index');
Route::resource('/chapters','ChapterController');
Route::get('/coauthors/{slug}','AuthorinviteController@index');
//Route::get('/coauthors/{id}/edit','AuthorinviteController@edit');
Route::get('/mybffbooks','BookController@bffbooks')->name('mybooks.bbfbooks');
Route::post('/coauthors/{bookId}','AuthorinviteController@store');
Route::resource('/coauthors','AuthorinviteController');
Route::resource('/homeworks','HomeworkController');
Route::resource('/mybooks','BookController');