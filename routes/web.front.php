<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'as' => 'app.',
    'namespace' => 'Front',
], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::post('locale', 'LocalesController')->name('locale');

    Route::group([
        'as' => 'pages.',
    ], function () {
        Route::get('contacts', 'PagesController@contacts')->name('contacts');
        Route::get('about', 'PagesController@about')->name('about');
    });

    /** Articles */
    Route::group([
        'as' => 'articles.',
        'prefix' => 'news',
    ], function () {
        Route::get('/', 'ArticlesController@index')->name('index');
        Route::get('{article}', 'ArticlesController@show')->name('show');
    });

    Route::group([
        'as' => 'services.',
        'prefix' => 'services',
    ], function () {
        Route::get('/', 'ServicesController@index')->name('index');
    });

    Route::group([
        'as' => 'directions.',
        'prefix' => 'departments',
    ], function () {
        Route::get('/', 'DirectionsController@index')->name('index');
        Route::get('{category}', 'DirectionsController@show')->name('show');
    });

    Route::group([
        'as' => 'methods.',
        'prefix' => 'directions',
    ], function () {
//        Route::get('/', 'MethodsController@index')->name('index');
        Route::redirect('/', url('/'))->name('index');
        Route::get('{direction}', 'MethodsController@show')->name('show');
    });

    Route::post('appointments', 'AppointmentsController@form')->name('appointments');
    Route::post('subscribe', 'SubscribesController@create')->name('subscribe');

    Route::get('reviews', 'ReviewsController@index')->name('reviews.index');
    Route::get('faq', 'QuestionsController@index')->name('faq.index');
    Route::get('{command}', 'CommandController@show')->name('command.show');


});
