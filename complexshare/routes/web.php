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

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/quit', 'QuitController@index')->name('quit');

Route::post('/quit', 'QuitController@delete')->name('quit.delete');

Route::get('/article', 'ArticleController@index')->name('top');

Route::resource('articles', 'ArticleController', ['only' => ['create', 'store', 'show', 'edit', 'update', 'destroy']]);

Route::resource('comments', 'CommentsController', ['only' => ['store']]);

Route::post('/articles/{articles}/likes', 'LikesController@store');

Route::post('/articles/{articles}/likes/{like}', 'LikesController@destroy');

Route::get('/mypage' , 'MypageController@index');
