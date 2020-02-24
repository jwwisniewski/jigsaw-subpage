<?php

Route::middleware('web')
    ->namespace('jwwisniewski\Jigsaw\Subpage\Controllers')
    ->group(function () {
        Route::prefix('_admin')->group(function () {
            Route::prefix('subpage')->group(function () {
                Route::get('index', ['as' => 'subpage.index', 'uses' => 'SubpageController@index']);
                Route::get('create', ['as' => 'subpage.create', 'uses' => 'SubpageController@create']);
                Route::post('store', ['as' => 'subpage.store', 'uses' => 'SubpageController@store']);
                Route::get('edit/{subpage}', ['as' => 'subpage.edit', 'uses' => 'SubpageController@edit']);
                Route::post('update/{subpage}', ['as' => 'subpage.update', 'uses' => 'SubpageController@update']);
                Route::get('destroy/{subpage}', ['as' => 'subpage.destroy', 'uses' => 'SubpageController@destroy']);
            });
        });
    });
