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
    Route::get('/blog/{slug}', ['uses' => 'BlogController@getSingle', 'as' => 'blog.single']);
    Route::get('/', ['uses' => 'PageController@getIndex', 'as' => 'home']);
    Route::get('/about', ['uses' => 'PageController@getAbout', 'as' => 'about']);
    Route::get('/contact', ['uses' => 'PageController@getContact', 'as' => 'contact']);
    Route::post('/contact', ['uses' => 'PageController@postContact', 'as' => 'sendContact']);

    //  Posts Resources
    Route::resource('/posts', 'PostController');

    //  Categories Resources
    Route::resource('/categories', 'CategoryController', ['except' => ['create']]);

    //  Tags Resources
    Route::resource('/tags', 'TagController', ['except' => ['create']]);

    //  Comments Resources
    Route::post('/comments/{post_id}', ['uses' => 'CommentController@store', 'as' => 'comments.store']);
    Route::get('/comments/{id}/edit', ['uses' => 'CommentController@edit', 'as' => 'comments.edit']);
    Route::put('/comments/{id}', ['uses' => 'CommentController@update', 'as' => 'comments.update']);
    Route::delete('/comments/{id}', ['uses' => 'CommentController@destroy', 'as' => 'comments.destroy']);
    Route::get('/comments/{id}/delete', ['uses' => 'CommentController@delete', 'as' => 'comments.delete']);
});
