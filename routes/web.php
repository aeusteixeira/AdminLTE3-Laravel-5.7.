<?php

Route::get('/', 'HomeController@index')->name('home.index');

Auth::routes();
Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/', 'PainelController@index')->name('painel.index');
});

