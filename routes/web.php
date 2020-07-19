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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/contacts', 'ContactController@contacts')->name('contacts');
Route::get('/confirm_save', 'ContactController@confirm_save')->name('confirm_save');
Route::get('/confirm_edit/{id}', 'ContactController@confirm_edit')->name('confirm_edit');
Route::post('/contact_add', 'ContactController@contact_add')->name('contact_add');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('/list_contacts', 'ContactController');
    /* Route::get('/contact_delete/{id}', 'ContactController@destroy'); */
    /*Route::post('/list_contacts', 'ContactController@update')->name('list_contacts');;*/
});
