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
        Route::get('user', function () {
            // Matches The "/admin/users" URL
        });
    });
});
