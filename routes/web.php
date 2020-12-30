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

Route::get('/', 'SeriesController@index')->name('home');
Route::get('/series/criar', 'SeriesController@create')->name('create');
Route::post('/series/criar', 'SeriesController@store')->name('store');
Route::delete('/series/delete/{id}', 'SeriesController@destroy')->name('excluir');
Route::post('/series/{id}/editar', 'SeriesController@edit')->name('editar');

Route::get('/series/{serieId}/temporadas', 'TemporadasController@index')->name('list_temporadas');
