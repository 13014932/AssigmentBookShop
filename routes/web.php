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

//Admin Book View Page.
Route::get('adminbooks','BooksController@adminbooks');
//NEW BOOk DATA  -- for STORE NEW Book INFO BY ADMIN.
Route::post('/newbook','BooksController@storeNewBook');
//Book DELETE.
Route::post('/bookdelete','BooksController@bookdelete');

//Book  UPDATE data
Route::post('/bookupdate','BooksController@bookUpdate');


//USER Book View Page.
Route::get('userbooks','BooksController@userbooks');


//BUY Book.
Route::post('buybook','BuyBookController@storeBookAfterBuy');

//USER VIEW BookS AFTER BUY View Page.
Route::get('buydbooks','BuyBookController@viewBooksAfterBuy');

//Admin Book View Page errors.
Route::get('errors','BooksController@errors');