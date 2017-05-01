<?php
Route::GET('/','HomeController@index')->name('home');
//WORKING ON THIS NOW!!!! Visit dasan.dev/test/1
Route::GET('/test/{user}', function(\App\User $user){
    return view("redirects.purchaseComplete",compact('user'));
});

//Register //index = details //create = register //store = register complete
Route::GET('/register','RegistrationController@create');
Route::POST('/register','RegistrationController@store');
Route::GET('/admusers','RegistrationController@admin');
Route::GET('/user/{user}','RegistrationController@show')->name('userDetail');
Route::GET('/user/{user}/edit','RegistrationController@edit');
Route::PATCH('/user/{user}','RegistrationController@update');
Route::GET('/admusers/{user}/remove','RegistrationController@destroy');

//User Session //create = login //store = login succesful //destroy = logout
Route::GET('/login','SessionController@create');
Route::POST('/login','SessionController@store');
Route::GET('/user/{user}/editPassword','SessionController@edit');
Route::PATCH('/user/resetPassword/{user}','SessionController@update');
Route::GET('/logout','SessionController@destroy');

//Category Page
Route::GET('/category/{category}','CategoryController@show');

//Single Product Page
Route::GET('/product/{product}','ProductController@show');

//CommentController
Route::POST('/product/{product}/comment','CommentController@store');
Route::GET('/comment/{comment}/remove','CommentController@destroy');

//CartController
Route::GET('/mycart','CartController@show');
Route::POST('/addtocart','CartController@store')->name('addCart');
Route::POST('/updateQuantity','CartController@update');
Route::GET('/removeCart/{rowID}','CartController@destroy');
Route::GET('/destroyCart','CartController@empty');

//PurchaseController
Route::POST('/purchase','PurchaseController@store');

//Admin Pages
Route::GET('/cms','AdminController@index');
//BannerController
Route::GET('/admbanner','BannerController@admin');
Route::GET('/admbanner/create','BannerController@create');
Route::POST('/admbanner','BannerController@store');
Route::GET('/admbanner/{banner}/edit','BannerController@edit');
Route::PATCH('/admbanner/{banner}','BannerController@update');
Route::GET('/admbanner/{banner}/remove','BannerController@destroy');
//Top Products
Route::GET('/admtp','TopProductController@admin');
Route::GET('/admtp/{product}/edit','TopProductController@edit');
Route::PATCH('admtp/{product}','TopProductController@update');
Route::GET('/admtp/{product}/remove','TopProductController@destroy');
//CategoryController
Route::GET('/admcat','CategoryController@admin');
Route::GET('/admcat/create','CategoryController@create');
Route::POST('/admcat','CategoryController@store');
Route::GET('/admcat/{category}/edit','CategoryController@edit');
Route::PATCH('/admcat/{category}','CategoryController@update');
Route::POST('/admcat/{category}/remove','CategoryController@destroy');
//ProductController
Route::GET('/admpro','ProductController@admin');
Route::GET('/admpro/create','ProductController@create');
Route::POST('/admpro','ProductController@store');
Route::GET('/admpro/{product}/edit','ProductController@edit');
Route::PATCH('/admpro/{product}','ProductController@update');
Route::GET('/admpro/{product}/remove','ProductController@destroy');
//CommentController
Route::GET('/admcm','CommentController@admin');
//SubscriptionController
Route::get('/admsub','SubscriptionController@show');
