<?php
Route::group(['namespace' => 'Cms'], function () {
    Route::group(['middleware' => 'guest'], function () {
        Route::get('detail/{id}', 'ArticleController@detail')
            ->where('id', '[0-9]+')
            ->name('cms.detail');
    });
});