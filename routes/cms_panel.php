<?php

Route::group(['as' => 'client.', 'namespace' => 'Client'], function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('home');

});
Route::group(['prefix' => '/cms-panel/', 'as' => 'cms_panel.', 'namespace' => 'CmsPanel'],  function () {
    Route::group([], function () {
        Route::get('users/', 'UsersController@index')->name('users.index');
        Route::post('users/', 'UsersController@mass')->name('users.mass');

        Route::get('users/create', 'UsersController@create')->name('users.create');
        Route::put('users/store', 'UsersController@store')->name('users.store');

        Route::get('users/{id}/edit', 'UsersController@edit')->where(['id' => '[0-9]+'])->name('users.edit');

        Route::put('users/{id}/update', 'UsersController@update')->where(['id' => '[0-9]+'])->name('users.update');
    });#
    Route::group([], function () {
        Route::get('leads/', 'LeadsController@index')->name('leads.index');
        Route::post('leads/', 'LeadsController@mass')->name('leads.mass');

        Route::get('leads/create', 'LeadsController@create')->name('leads.create');
        Route::put('leads/store', 'LeadsController@store')->name('leads.store');

        Route::get('leads/{id}/edit', 'LeadsController@edit')->where(['id' => '[0-9]+'])->name('leads.edit');

        Route::put('leads/{id}/update', 'LeadsController@update')->where(['id' => '[0-9]+'])->name('leads.update');
    });#


    Route::get('/','DashBoard@index')->name('dashboard');


    Route::group([ 'prefix' => 'apm', 'namespace' => 'Apm', 'as' => 'apm.'], function () {
            Route::get('clear-laravel','\App\Helper@artisanClearLaravel')->name('clear_laravel');
            Route::post('upload-image/{path}', '\App\Helper@uploadImageLaravel')->name('upload_image_laravel');
            Route::get('language/{lang}','\App\Helper@changeLang')->name('language');
        });
    Route::group([ 'prefix' => 'auth', 'namespace' => 'Auth', 'as' => 'auth.'], function () {
        Route::get('/login', 'LoginController@showLoginForm')->name('login');
        Route::post('/login', 'LoginController@login');
        Route::any('/logout', 'LoginController@logout')->name('logout');
    });

Route::get('language/{lang}','\App\Helper@changeLang')->name('language');

});
