<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CmsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
    }

    /**
     * Register service provider bindings
     */
    public function registerBindings()
    {
        $this->app->bind(
            \App\Repositories\Frontend\Cms\Article\ArticleRepositoryContract::class,
            \App\Repositories\Frontend\Cms\Article\EloquentArticleRepository::class
        );

        $this->app->bind(
            \App\Repositories\Backend\Cms\Article\ArticleRepositoryContract::class,
            \App\Repositories\Backend\Cms\Article\EloquentArticleRepository::class
        );

        $this->app->bind(
            \App\Repositories\Backend\Cms\Category\CategoryRepositoryContract::class,
            \App\Repositories\Backend\Cms\Category\EloquentCategoryRepository::class
        );

        $this->app->bind(
            \App\Repositories\Backend\Cms\Collection\ArticleRepositoryContract::class,
            \App\Repositories\Backend\Cms\Collection\EloquentArticleRepository::class
        );
    }

    /**
     * 注册自定义的组件
     */
    public function registerCustomForms(){
        
    }
}
