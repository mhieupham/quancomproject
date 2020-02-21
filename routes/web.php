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
Route::resource('food','FoodController');
Route::get('home','PagesController@index')->name('home');
Route::get('thongke','PagesController@thongke')->name('thongke');
Route::post('insertfood','HistoryController@insert')->name('insertfood');
Route::get('getdate','HistoryController@getValueWhereDate');





