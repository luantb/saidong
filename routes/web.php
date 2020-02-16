<?php

Route::get('/', 'HomeController@index');
Route::get('/tin-tuc', 'PostController@index');
Route::get('/lien-he', 'HomeController@contact');
Route::get('/tin-tuc/{slug}', 'PostController@view')->name('news.detail');
Route::post('/home/sendRequest', 'HomeController@sendRequest')->name('home.sendRequest');
//Route::redirect('/', '/home');

//Route::redirect('/home', '/admin');

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

    Route::post('/landingPage/store', 'LandingPageController@store')->name('landingPage.store');
    Route::post('/landingPage/store', 'LandingPageController@store')->name('test.store');
    Route::get('/landingPage/edit/{id}', 'LandingPageController@edit')->name('landingPage.edit');
    Route::get('/landingPage/destroy', 'LandingPageController@destroy')->name('test.destroy');
    Route::post('/landingPage/deleteImage', 'LandingPageController@deleteImage')->name('landingPage.deleteImage');
    Route::get('/clientRequest/{id}', 'clientRequest@edit')->name('landingPage.edit');


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
    Route::resource('landingPage', 'LandingPageController');
    Route::resource('home', 'HomeController');
    Route::resource('clientRequest', 'ClientRequestController');
});
