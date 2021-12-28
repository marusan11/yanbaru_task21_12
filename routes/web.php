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

// ログイン状態じゃなくても見れる状態
Route::get('/', 'PostController@index')->name('post.index'); // 投稿一覧


// ['middleware' => 'auth']でグループ化されたものは「ログインした状態じゃないとアクセスできない」という設定をしています。
Route::group(['middleware' => 'auth'], function () {
    Route::get('post/create','PostController@create')->name('post.create'); // 投稿画面表示
    Route::post('post/create','PostController@store')->name('post.store'); // 投稿処理
    //{id}はルートパラメータ(必須パラメータ)
    Route::get('post/{id}/show','PostController@show')->name('post.show'); // 詳細画面表示
    Route::get('post/{id}/edit','PostController@edit')->name('post.edit'); // 編集画面表示
    Route::post('post/{id}/update','PostController@update')->name('post.update'); // 編集内容の更新
    Route::get('post/{id}/delete','PostController@delete')->name('post.delete'); // 投稿削除
});