<?php
date_default_timezone_set('Pacific/Auckland');

Route::get('/','HomeController@index')->name('home');

//Register //index = details //create = register //store = register complete
Route::GET('/register','RegistrationController@create');
Route::POST('/register','RegistrationController@store');

//User Session //create = login //store = login succesful //destroy = logout
Route::GET('/login','SessionController@create');
Route::POST('/login','SessionController@store');
Route::get('/logout','SessionController@destroy');

//Admin Pages
Route::GET('/cms','AdminController@index');

//BannerController
Route::GET('/admbanner','BannerController@admin')->name('banner');
Route::GET('/admbanner/create','BannerController@create');
Route::POST('/admbanner','BannerController@store');
Route::GET('/admbanner/{banner}/edit','BannerController@edit');
Route::PATCH('/admbanner/{banner}','BannerController@update');
Route::GET('/admbanner/{banner}','BannerController@destroy');
//CategoryController
//ProductController
//RatingController
//BannerController
//BannerController
