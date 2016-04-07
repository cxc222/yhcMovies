<?php
/**
 * 扩展一个CMS系统
 */
Route::group([
    'prefix'     => 'cms',
    'namespace'  => 'Cms',
    'middleware' => 'access.routeNeedsPermission:view-access-management',
], function() {
    Route::group(['namespace' => 'Article'], function () {
        Route::resource('articles', 'ArticleController', ['except' => ['show']]);
        //Route::get('articles/deleted', 'ArticleController@deleted')->name('admin.cms.articles.deleted');
        
    });
});