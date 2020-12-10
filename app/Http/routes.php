<?php

Route::get('/', function () {
    return view('welcome');
});
Route::get('/series','SeriesController@listarSeries');
Route::get('/series/adicionar','SeriesController@create');
Route::post('/series/adicionar','SeriesController@store');
Route::delete('/series/{id}','SeriesController@destroy');
Route::post('/series/{id}/editaNome','SeriesController@editaNome');

Route::get('/series/{serieId}/temporadas','TemporadasController@index');

Route::get('/temporadas/{temporada}/episodios','EpisodiosController@index');
Route::post('/temporadas/{temporada}/episodios/assistir','EpisodiosController@assistir');

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/entrar','EntrarController@index');
Route::post('/entrar','EntrarController@entrar');
