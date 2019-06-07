<?php

use App\Events\MessagePosted;
use App\Http\Controllers\MessagesUsersController;
    
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

Route::get('/chat', function () {
    return view('messages.with_user');
})->middleware('auth');

Auth::routes();

/***********************************************
  ***** ROUTES EN MODE CONNECTE
  **********************************************/
Route::group(['middleware'=> ['auth', 'lastRequest', 'SessionTimeout' ]], function()  {
      
      /*****************************************
      ***************** Home *****************
      ******************************************/
      Route::get('/home', 'HomeController@index')->name('home');
      Route::get('/', 'HomeController@index')->name('home');
      Route::post('/home/switch-liste-gauche', 'HomeController@switchListeGauche')->name('switch-liste-gauche');                      
      Route::post('/home/switch-liste-droite', 'HomeController@switchListeDroite')->name('switch-liste-droite');                            
      
      /******************************************
       **************** Room ***************** 
      ******************************************/      
      Route::get('/room/get/{id}', 'RoomsController@getById')->name('get-room-by-id');      
      Route::post('/room/edit-form', 'RoomsController@showEditForm')->name('show-edit-form');    
      
      Route::post('/room/add-from-vue', 'RoomsController@addFromVue')->name('add-from-vue');      
      Route::post('/room/edit-from-vue', 'RoomsController@editFromVue')->name('edit-from-vue');      
      
      /*****************************************************
       **************** Message User ***************** 
      ******************************************************/      
      Route::post('/message/send-to-user', 'MessagesUsersController@sendToUser')->name('message-send-to-user');
      Route::post('/message/send-to-room', 'MessagesRoomsController@sendToRoom')->name('message-send-to-room');    
      Route::post('/message-user/checkNew', 'MessagesUsersController@checkNew')->name('check-new-messages-user');       
      
      /*********************************************
      ************** Clear cache *************
      *********************************************/
     Route::get('/clear-cache', function() {
           $exitCode = Artisan::call('cache:clear');
           // return what you want
     });

 });
 
 /****************************************************
  ******************* VUE JS *********************
  ****************************************************/
Route::get('messages/{id}', 'MessagesUsersController@fetchMessages');
Route::post('messages', 'MessagesUsersController@sendMessage');
