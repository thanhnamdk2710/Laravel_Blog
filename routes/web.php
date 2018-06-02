<?php

Route::group(['middleware' => ['web']], function (){
    Route::get('/', 'PageController@getIndex')->name('home');
    Route::get('/about', 'PageController@getAbout')->name('about');
    Route::get('/contact', 'PageController@getContact')->name('contact');
    Route::post('/contact', 'PageController@postContact');
    Route::resource('/posts', 'PostController');
});
