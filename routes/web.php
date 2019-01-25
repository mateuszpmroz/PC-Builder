<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

//Frontend
Route::get('/', 'Frontend\FrontendController@index')->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

//Backend
Route::middleware(['auth', 'admin'])->group(function () {
    Route::prefix('backend')->group(function () {
        Route::get('/', 'Backend\BackendController@index');
        //users
        Route::get('users', 'Backend\UserController@index')->name('backend.users');
        Route::post('user/store', 'Backend\UserController@store')->name('backend.user.store');
        Route::post('user/delete/{id}', 'Backend\UserController@destroy')->name('backend.user.delete');
        Route::post('user/update/{id}', 'Backend\UserController@update')->name('backend.user.update');
        //components
        Route::get('components', 'Backend\ComponentController@index')->name('backend.components');
        Route::post('component/store', 'Backend\ComponentController@store')->name('backend.component.store');
        Route::post('component/delete/{id}', 'Backend\ComponentController@destroy')->name('backend.component.delete');
        Route::post('component/update/{id}', 'Backend\ComponentController@update')->name('backend.component.update');
        //applcations
        Route::get('applications', 'Backend\ApplicationController@index')->name('backend.applications');
        Route::post('application/store', 'Backend\ApplicationController@store')->name('backend.application.store');
        Route::post('application/delete/{id}', 'Backend\ApplicationController@destroy')->name('backend.application.delete');
        Route::post('application/update/{id}', 'Backend\ApplicationController@update')->name('backend.application.update');
    });
});
