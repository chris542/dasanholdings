<?php

Route::get('/','HomeController@index')->name('home');
Route::GET('/register','RegistrationController@create');
Route::POST('/register','RegistrationController@store');

Route::GET('/login','SessionController@create');
Route::POST('/login','SessionController@store');
Route::get('/logout','SessionController@destroy');
