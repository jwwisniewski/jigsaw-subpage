<?php
Route::prefix('_admin')->group(function () {

    Route::prefix('subpage')->group(function () {
        Route::get('index', array('as' => 'subpage.index', 'uses' => 'SubpageController@index'));
        Route::get('create', array('as' => 'subpage.create', 'uses' => 'SubpageController@create'));
        Route::post('store', array('as' => 'subpage.store', 'uses' => 'SubpageController@store'));
        Route::get('edit/{subpage}', array('as' => 'subpage.edit', 'uses' => 'SubpageController@edit'));
        Route::post('update/{subpage}', array('as' => 'subpage.update', 'uses' => 'SubpageController@update'));
        Route::get('destroy/{subpage}', array('as' => 'subpage.destroy', 'uses' => 'SubpageController@destroy'));
    });

});
