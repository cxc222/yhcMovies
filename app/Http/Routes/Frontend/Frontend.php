<?php
/**
 * Frontend Controllers
 */
Route::get('/', 'FrontendController@index')->name('frontend.index');
Route::get('macros', 'FrontendController@macros')->name('frontend.macros');

Route::group(['namespace' => 'Cms'], function() {
    /**
     * 获取 详情
     */
    Route::get('detail/{id}', 'ArticleController@detail')
        ->where('id', '[0-9]+')
        ->name('cms.detail');
    /**
     * 最新列表
     */
    Route::get('news/{page?}', 'ArticleController@newsList')
        ->where('page', '[0-9]+')
        ->name('cms.news');

    Route::get('search/{keyword?}/{page?}', 'ArticleController@search')
        ->where('page', '[0-9]+')
        //->where('keyword', '')
        ->name('cms.search');

    Route::get('tag/{tag}/{page?}', 'ArticleController@searchTag')
        ->where('page', '[0-9]+')
        //->where('keyword', '')
        ->name('cms.search.tag');
});

Route::get('test', function (App\Repositories\Backend\Cms\Collection\ArticleRepositoryContract $articleRepositoryContract){
    /*$job = (new App\Jobs\Test());
    //$job = (new App\Jobs\Baidu());
    dispatch($job);
    return 'Done!';*/

    /*$res = $articleRepositoryContract->checkArticle(66);
    print_r($res);
    die;*/

    /*preg_match_all("/(?:《)(.*)(?:》)/i", "2016高分剧情《魔兽》HD720P.中英双字", $alias);
    //$b = \App\Libraries\Douban::movie_search($alias[1][0]);
    $response = \App\Libraries\Douban::movie_search($alias[1][0]);
    if(isset($response->subjects[0]) && !empty($response->subjects[0])){
        $subject = \App\Libraries\Douban::movie_subject($response->subjects[0]->id);
        foreach ($subject->directors as $director){
            print_r($director);
            die;
        }

    }
    print_r($subject);
    die;*/
})->name('frontend.macros');

/**
 * These frontend controllers require the user to be logged in
 */
Route::group(['middleware' => 'auth'], function () {
    Route::group(['namespace' => 'User'], function() {
        Route::get('dashboard', 'DashboardController@index')->name('frontend.user.dashboard');
        Route::get('profile/edit', 'ProfileController@edit')->name('frontend.user.profile.edit');
        Route::patch('profile/update', 'ProfileController@update')->name('frontend.user.profile.update');
    });
});