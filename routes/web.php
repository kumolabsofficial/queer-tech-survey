<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => '/', 'as' => 'frontend.', 'namespace' => 'App\Http\Controllers'], function () {
    Route::get('/', 'FrontendController@index')->name('index');
    Route::get('/about', 'FrontendController@about')->name('about');
    Route::get('/privacy', 'FrontendController@privacy')->name('privacy');
    Route::get('/terms', 'FrontendController@terms')->name('terms');
    Route::get('/survey', 'FrontendController@survey')->name('survey');
    Route::post('/survey', 'FrontendController@storeSurvey')->name('survey.store');
    Route::get('/thank-you', 'FrontendController@thankYou')->name('thank-you');
});

// Admin auth routes (guest only)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->middleware('auth')->name('logout');
});

// Admin protected routes
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [AdminController::class, 'editProfile'])->name('profile.edit');
    Route::patch('/profile', [AdminController::class, 'updateProfile'])->name('profile.update');
});
