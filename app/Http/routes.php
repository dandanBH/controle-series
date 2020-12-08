<?php

Route::get('/', function () {
    return view('welcome');
});
Route::get('/series','SeriesController@listarSeries');
Route::get('/series/adicionar','SeriesController@create');
Route::post('/series/adicionar','SeriesController@store');
Route::delete('/series/{id}','SeriesController@destroy');

Route::get('/series/{serieId}/temporadas','TemporadasController@index');