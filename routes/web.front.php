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

    Route::get('faq', 'QuestionsController@index')->name('faq.index');
    Route::group([
        'as' => 'pages.',
        'prefix' => 'pages',
    ], function () {
        Route::get('contacts', 'PagesController@contacts')->name('contacts');
    });
    Route::group([
        'as' => 'services.',
        'prefix' => 'services',
    ], function () {
        Route::get('/', 'ServicesController@index')->name('index');
    });
});