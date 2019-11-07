<?php


Route::group([
    'prefix' => 'cms-panel',
    'namespace' => 'CmsPanel',
    'as' => 'cms_panel.',
], function () {
    Route::get('/','DashBoard@index');
    Route::group([
        'prefix' => 'auth',
        'namespace' => 'Auth',
        'as' => 'auth.',
    ], function () {

        Route::get('/login', 'LoginController@showLoginForm')->name('login');
        Route::post('/login', 'LoginController@login');
        Route::any('/logout', 'LoginController@logout')->name('logout');

        #Route::any('/password/reset', 'ResetPasswordController@showResetForm')->name('password.reset');

        #Route::get('/password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
        #Route::post('/password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        #Route::get('/password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
        #Route::post('/password/reset', 'ResetPasswordController@reset');


        #Route::get('/register', 'RegisterController@showRegistrationForm')->name('register');
        #Route::post('/register', 'RegisterController@register');


    });
});


Auth::routes();




Route::get('/', function () {
    return view('welcome');
});


