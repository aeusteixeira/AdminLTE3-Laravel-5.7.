<?php

Route::get('/', 'PainelController@index')->name('home.index');
Auth::routes();
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth']], function () {

Route::get('logout', 'Auth\LoginController@logout')->name('exit');

    Route::get('/', function(){
        return redirect()->route('dashboard.index');
    });

    Route::get('users/me', 'UserController@me')->name('perfil');
    Route::put('users/me/{id}', 'AttributesController@update')->name('perfil.update');

    // Rotas de Vendas
    Route::group(['prefix' => 'index', 'as' => 'dashboard.'], function(){
        Route::get('/', 'PainelController@index')->name('index');
        Route::get('support', 'SuportController@index')->name('support.index');
        Route::get('divulgation', 'DivulgationController@divulgations')->name('divulgation.index');
        Route::get('divulgation/download/{id}', 'DivulgationController@download')->name('divulgation.download');
        Route::get('trainings', 'PostController@trainings')->name('trainings.index');
        Route::get('information', 'PostController@information')->name('information.index');
        Route::get('campaigns', 'CampaignController@index')->name('campaigns.index');
        Route::get('my-leads', 'RegisterUserController@myCalls')->name('mycalls.index');
        Route::get('accompaniment', 'AccompanimentController@index')->name('accompaniment.index');
    });

    //Rotas de Admin
    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){
        Route::resource('users', 'UserController');
        Route::resource('levels', 'LevelController');
        Route::resource('units', 'UnitController');
        Route::resource('templates', 'TemplateController');
        Route::resource('layouts', 'layoutCampaignController');
        Route::resource('divulgation', 'DivulgationController');
        Route::resource('posts', 'PostController');
        Route::resource('message', 'MessageController');
    });

    //Rotas de Marketing
    Route::group(['prefix' => 'marketing', 'as' => 'mkt.'], function(){
        Route::resource('campaigns', 'CampaignController');
        Route::resource('email', 'EmailController');
        Route::resource('registers', 'RegisterUserController');
        Route::post('registers/comment', 'CommentsCampaignRegistersController@store')->name('comment');
        Route::post('campaigns/{id}', 'CampaignController@search')->name('search.register');
        Route::post('campaigns/filter/{id}', 'CampaignController@filterForUnit')->name('filter.filterForUnit');
    });

    //Rotas de CRUD
    Route::get('/{url}/create')->name('createCrud');
    Route::get('/{url}/{id}')->name('viewCrud');
    Route::post('/{url}/{id}')->name('deleteCrud');
    Route::get('/{url}/{id}/edit')->name('editCrud');
});

Route::get('/sendEmail', 'RegisterUserController@sendEmail');
Route::get('/{slug}', 'CampaignController@view')->name('campaigns.view');
