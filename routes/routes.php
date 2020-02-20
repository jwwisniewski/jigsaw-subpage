<?php
Route::prefix('_admin')->group(function () {

    Route::prefix('subpage')->group(function () {
        Route::get('index', array('as' => 'subpage.index', 'uses' => 'jwwisniewski\Jigsaw\Subpage\Controllers\SubpageController@index'));
        Route::get('create', array('as' => 'subpage.create', 'uses' => 'jwwisniewski\Jigsaw\Subpage\Controllers\SubpageController@create'));
        Route::post('store', array('as' => 'subpage.store', 'uses' => 'jwwisniewski\Jigsaw\Subpage\Controllers\SubpageController@store'));
        Route::get('edit/{subpage}', array('as' => 'subpage.edit', 'uses' => 'jwwisniewski\Jigsaw\Subpage\Controllers\SubpageController@edit'));
        Route::post('update/{subpage}', array('as' => 'subpage.update', 'uses' => 'jwwisniewski\Jigsaw\Subpage\Controllers\SubpageController@update'));
        Route::get('destroy/{subpage}', array('as' => 'subpage.destroy', 'uses' => 'jwwisniewski\Jigsaw\Subpage\Controllers\SubpageController@destroy'));
    });

});
