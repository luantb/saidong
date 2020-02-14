<?php

Route::redirect('/', '/login');

Route::redirect('/home', '/admin');

Auth::routes(['register' => false]);



Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/post', 'PostController@index')->name('post');
    Route::get('/post/create', 'PostController@create')->name('post.create');
    Route::post('/post/store', 'PostController@store')->name('post.store');

    // banner
    Route::get('/banner', 'BannerController@index')->name('banner');
    Route::get('/banner/create', 'BannerController@create')->name('banner.create');
    Route::get('/banner/edit', 'BannerController@edit')->name('banner.edit');
    Route::post('/banner/store', 'BannerController@store')->name('banner.store');


    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');

    Route::resource('permissions', 'PermissionsController');

    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');

    Route::resource('roles', 'RolesController');

    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');

    Route::resource('users', 'UsersController');

    Route::delete('products/destroy', 'ProductsController@massDestroy')->name('products.massDestroy');
    Route::post('post/hide', 'PostController@hide')->name('post.hide');
    Route::post('post/showPost', 'PostController@showPost')->name('post.showPost');

    Route::resource('products', 'ProductsController');
    Route::resource('banner', 'BannerController');
    Route::resource('post', 'PostController');
});
