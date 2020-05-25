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

Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index');
    Route::get('/contactFormFields', 'AdminController@show_contact_form_fields');
    Route::get('/contactFormEntries', 'AdminController@show_contact_form_entries');
    Route::post('/addContactFormField', 'AdminController@add_contact_form_field');
    Route::post('/editContactFormField/{id}', 'AdminController@edit_contact_form_field');
});
