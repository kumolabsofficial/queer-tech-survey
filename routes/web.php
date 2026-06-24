<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => '/', 'as' => 'frontend.','namespace'=>'App\Http\Controllers'], function () {
    Route::get('/', 'FrontendController@index')->name('index');
    Route::get('/about', 'FrontendController@about')->name('about');
    Route::get('/privacy', 'FrontendController@privacy')->name('privacy');
    Route::get('/terms', 'FrontendController@terms')->name('terms');
    Route::get('/survey', 'FrontendController@survey')->name('survey');
    Route::post('/survey', 'FrontendController@storeSurvey')->name('survey.store');
    Route::get('/thank-you', 'FrontendController@thankYou')->name('thank-you');
});