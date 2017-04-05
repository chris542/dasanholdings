<?php

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
Route::GET('/admbanner','BannerController@update');
//CategoryController
//ProductController
//RatingController
//BannerController
//BannerController
