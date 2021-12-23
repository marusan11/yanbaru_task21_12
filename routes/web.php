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

use Illuminate\Support\Facades\Route;

Route::get('sample','SampleController@index')->name('sample');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



//['middleware' => 'auth']でグループ化されたものは「ログインした状態じゃないとアクセスできない」という設定をしています。
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'PostController@index')->name('post.index');
    Route::get('post/create','PostController@create')->name('post.create');
    Route::post('post/create','PostController@store')->name('post.store');
    //{id}はルートパラメータ(必須パラメータ)
    //詳細ボタンを押した際にどの投稿を詳細表示するかをコントローラーに渡す必要があるのですが、このように定義することで投稿データのをURLに埋め込んでコントローラーに渡すことができます。
    Route::get('post/{id}/show','PostController@show')->name('post.show');
});