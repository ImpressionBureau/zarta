<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'as' => 'app.',
    'namespace' => 'Front',
], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::post('locale', 'LocalesController')->name('locale');

    /** Articles */
    Route::group([
        'as' => 'articles.',
        'prefix' => 'articles',
    ], function () {
        Route::get('/', 'ArticlesController@index')->name('index');
        Route::get('{article}', 'ArticlesController@show')->name('show');
    });

    Route::group([
        'as' => 'pages.',
        'prefix' => 'pages',
    ], function () {
        Route::get('contacts', 'PagesController@contacts')->name('contacts');
        Route::get('about', 'PagesController@about')->name('about');
    });
    Route::group([
        'as' => 'services.',
        'prefix' => 'services',
    ], function () {
        Route::get('/', 'ServicesController@index')->name('index');
    });

    Route::group([
        'as' => 'directions.',
        'prefix' => 'directions',
    ], function () {
        Route::get('/', 'DirectionsController@index')->name('index');
        Route::get('{item}', 'DirectionsController@show')->name('show');
    });

    Route::group([
        'as' => 'methods.',
        'prefix' => 'methods',
    ], function () {
        Route::get('/', 'MethodsController@index')->name('index');
        Route::get('{item}', 'MethodsController@show')->name('show');
    });
    Route::group([
        'as' => 'appointments.',
        'prefix' => 'appointments',
    ], function () {
        Route::post('/form', 'AppointmentsController@form')->name('form');
        Route::post('/modal', 'AppointmentsController@modal')->name('modal');
    });
    Route::get('reviews', 'ReviewsController@index')->name('reviews.index');
    Route::get('faq', 'QuestionsController@index')->name('faq.index');
    Route::get('{command}', 'CommandController@show')->name('command.show');

});