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

Route::post('/register-user','AppRegistrationController@register');
Route::post('/lagna-result','AppRegistrationController@category');
Route::post('/set-ascendant','AppRegistrationController@setAscendant');

Route::resource('messages','MessagesController');
Route::resource('subscriptions','SubscriptionsController');
Route::get('send-message','MessageSendingController@sendMessages');




