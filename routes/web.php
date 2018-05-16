<?php
use App\Http\Controllers\Crud;
use Illuminate\Auth\Middleware\Authenticate;
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
Route::get('adminbooks','Crud\BooksController@adminbooks');
//NEW BOOk DATA  -- for STORE NEW Book INFO BY ADMIN.
Route::post('/newbook','Crud\BooksController@storeNewBook');
//Book DELETE.
Route::post('/bookdelete','Crud\BooksController@bookdelete');

//Book  UPDATE data
Route::post('/bookupdate','Crud\BooksController@bookUpdate');


//USER Book View Page.
Route::get('userbooks','Crud\BooksController@userbooks')->middleware('auth');


//BUY Book.
Route::post('buybook','Crud\BuyBooksController@storeBookAfterBuy');

//USER VIEW BookS AFTER BUY View Page.
Route::get('buydbooks','Crud\BuyBooksController@viewBooksAfterBuy');

//Admin Book View Page errors.
Route::get('errors','Crud\BooksController@errors');
Auth::routes();

Route::get('/home', 'HomeController@index');


Route::get('/admin', 'AdminController@admin')
    ->middleware('is_admin')
    ->name('adminbooks');