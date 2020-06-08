<?php

Route::get('/', 'PainelController@index')->name('home.index');

Auth::routes();
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth']], function () {
    Route::group(['prefix' => 'index', 'as' => 'dashboard.'], function(){
        Route::get('/', 'PainelController@index')->name('index');
        Route::get('support', 'SuportController@index')->name('support.index');
        Route::get('divulgation', 'DivulgationController@index')->name('divulgation.index');
    });
    //Rotas de Admin
    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){
        Route::resource('users', 'UserController');
        Route::resource('levels', 'LevelController');
        Route::resource('units', 'UnitController');
        Route::resource('templates', 'TemplateController');
        Route::resource('layouts', 'layoutCampaignController');
    });

    //Rotas de Marketing
    Route::group(['prefix' => 'marketing', 'as' => 'mkt.'], function(){
        Route::resource('campaigns', 'CampaignController');
        Route::resource('email-marketing', 'EmailController');
    });

    //Rotas de CRUD
    Route::get('/{url}/create')->name('createCrud');
    Route::get('/{url}/{id}')->name('viewCrud');
    Route::post('/{url}/{id}')->name('deleteCrud');
    Route::get('/{url}/{id}/edit')->name('editCrud');
});
