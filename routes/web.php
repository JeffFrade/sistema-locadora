<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect(route('login'));
});

Auth::routes(['register' => false]);

Route::group(['middleware' => 'auth', 'prefix' => 'dashboard'], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::group(['prefix' => 'clientes'], function () {
        Route::get('/', 'ClienteController@index')->name('dashboard.clientes.index');
        Route::get('/create', 'ClienteController@create')->name('dashboard.clientes.create');
        Route::post('/store', 'ClienteController@store')->name('dashboard.clientes.store');
        Route::get('/edit/{id}', 'ClienteController@edit')->name('dashboard.clientes.edit');
        Route::put('/update/{id}', 'ClienteController@update')->name('dashboard.clientes.update');
        Route::delete('/delete/{id}', 'ClienteController@delete')->name('dashboard.clientes.delete');
        Route::put('/status/{id}', 'ClienteController@status')->name('dashboard.clientes.status');
    });
    Route::group(['prefix' => 'categorias'], function () {
        Route::get('/', 'CategoriaController@index')->name('dashboard.categorias.index');
        Route::get('/create', 'CategoriaController@create')->name('dashboard.categorias.create');
        Route::post('/store', 'CategoriaController@store')->name('dashboard.categorias.store');
        Route::get('/edit/{id}', 'CategoriaController@edit')->name('dashboard.categorias.edit');
        Route::put('/update/{id}', 'CategoriaController@update')->name('dashboard.categorias.update');
        Route::delete('/delete/{id}', 'CategoriaController@delete')->name('dashboard.categorias.delete');
    });
});
