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

Route::view('/','welcome')->name('front');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('oauth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('oauth/{provider}/callback','Auth\LoginController@handleProviderCallback');

Route::get('/social/edit','SocialSettingController@editSocial')->name('social.edit');
Route::put('/social/update', 'SocialSettingController@updateSocial')->name('social.update');
