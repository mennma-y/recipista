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
    return view('recipi.index');
 });

Auth::routes();

Route::group(['middleware'=>'auth'],function(){
    //ホーム画面
    Route::get('/home', 'HomeController@index')->name('recipi.home');
    //ユーザー画面
    Route::get('/user/{id}','UserController@index')->name('user.index');  
    Route::post('/user/update/{id}','UserController@update')->name('user.update');
    //recipishare画面
    Route::get('/recipi','RecipiController@index')->name('recipi.main');
    Route::get('/recipi/create','RecipiController@create')->name('recipi.create');
    Route::post('/recipi/store','RecipiController@store')->name('recipi.store');
    Route::get('/recipi/show/{id}','RecipiController@show')->name('recipi.show');
    Route::get('/recipi/edit/{id}','RecipiController@edit')->name('recipi.edit');
    Route::post('/recipi/update/{id}','RecipiController@update')->name('recipi.update');
    Route::post('/recipi/delete/{id}','RecipiController@delete')->name('recipi.delete');
    Route::get('/recipi/other/{id}','RecipiController@other')->name('recipi.other');

    //フォロー関連
    //フォローをする
    Route::get('/follow/{id}','FollowUserController@store')->name('follow');
    //フォローを外す
    Route::get('/deletefollow/{id}','FollowUserController@delete')->name('deletefollow');

    //Route::post('/follow','FollowController@follow')->name('isfollow');

    //いいね
    Route::post('likes/{recipi}/favorites', 'FavoriteController@store')->name('favorites');
    Route::post('likes/{recipi}/unfavorites', 'FavoriteController@destroy')->name('unfavorites');


    //通知
    Route::get('/notification','NotificationController@index')->name('notification');
    


    

    
    
    
});


