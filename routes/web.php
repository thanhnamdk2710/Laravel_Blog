<?php

Route::group(['middleware' => ['web']], function (){
    //  Authentication Routes
    Route::get('auth/login', 'Auth\LoginController@showLoginForm')->name('getLogin');
    Route::post('auth/login', 'Auth\LoginController@login')->name('login');
    Route::get('auth/logout', 'Auth\LoginController@logout')->name('logout');

    //  Registration Route
    Route::get('auth/register', 'Auth\RegisterController@showRegistrationForm')->name('getRegister');
    Route::post('auth/register', 'Auth\RegisterController@register')->name('register');

    Route::get('/blog', 'BlogController@getIndex')->name('blog.index');
    Route::get('/blog/{slug}', 'BlogController@getSingle')->name('blog.single');
    Route::get('/', 'PageController@getIndex')->name('home');
    Route::get('/about', 'PageController@getAbout')->name('about');
    Route::get('/contact', 'PageController@getContact')->name('contact');
    Route::post('/contact', 'PageController@postContact');
    Route::resource('/posts', 'PostController');
});
