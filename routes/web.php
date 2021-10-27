<?php

use Illuminate\Support\Facades\Route;

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

Route::resource('agenda', 'AgendaController');
Route::resource('detailagenda', 'DetailAgendaController');

Route::get('/', 'AgendaController@index')->name('/');
Route::get('apiAgenda', 'AgendaController@dataAPI')->name('api.agenda');
