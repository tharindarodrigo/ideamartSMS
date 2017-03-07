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

//Auth::routes();
//
//Route::get('/home', 'HomeController@index');
//
//Route::get('messages', function(){
//    return view('control-panel.test');
//});

Route::group(['middleware'=>'auth'], function(){

    Route::resource('messages','MessagesController');
    Route::resource('first-messages','FirstMessagesController');
    Route::post('messages/search','MessagesController@search')->name('messages.search');
    Route::get('messages/search/ascendant/{ascendant?}/date/{date?}','MessagesController@getMessages');
    Route::resource('subscriptions','SubscriptionsController');
});

Route::get('send-message','MessageSendingController@sendMessages');

Route::post('/register-user','AppRegistrationController@register');
Route::post('/set-ascendant','AppRegistrationController@setAscendant');

Auth::routes();

Route::get('/home', 'HomeController@index');
