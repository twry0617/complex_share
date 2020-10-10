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
    return view('top');
});

Auth::routes();

Route::group(['prefix' => 'quit'], function(){
Route::get('/', 'QuitController@index')->name('quit');
Route::post('/', 'QuitController@delete')->name('quit.delete');
});


Route::resource('articles', 'ArticleController', ['only' => ['index','create', 'store', 'show', 'edit', 'update', 'destroy']]);

Route::resource('comments', 'CommentsController', ['only' => ['store', 'destroy']]);

Route::post('articles/{articles}/likes', 'LikesController@store');

Route::post('{articles}/likes/{like}', 'LikesController@destroy');

Route::get('mypage' , 'MypageController@index');


Route::get('home' , 'HomeController@index');


Route::get("posts", 'PostController@index')->name('post.index');
Route::post("posts/create", 'PostController@create')->name('post.create');

