<?php
/**
 * 扩展一个CMS系统
 */
Route::group([
    'prefix'     => 'cms',
    'namespace'  => 'Cms',
    'middleware' => 'access.routeNeedsPermission:view-access-management',
], function() {

    /**
     * 文章
     */
    Route::group(['namespace' => 'Article'], function () {
        Route::resource('articles', 'ArticleController', ['except' => ['show']]);
        //Route::get('articles/deleted', 'ArticleController@deleted')->name('admin.cms.articles.deleted');
        //上传图片
        Route::post('uploadCover', 'ArticleController@uploadCover');
    });

    /**
     * 分类
     */
    Route::group(['namespace' => 'Category'], function () {
        Route::resource('categorys', 'CategoryController', ['except' => ['show']]);
    });
});