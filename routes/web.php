<?php

use Illuminate\Support\Facades\Route;
use App\Events\NewMessage;
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
Route::get('/contacts', 'contactController@get');
Route::get('/conversation/{id}', 'contactController@getMessages');
Route::get('/home/1', function(){
	event(new NewMessage('dfgfd'));
});
Route::post('/conversation/send', 'contactController@send');
Route::get('/info', function(){ phpinfo(); });







Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
