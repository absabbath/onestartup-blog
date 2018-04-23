<?php

namespace Onestartup\Blog;

use Illuminate\Support\ServiceProvider;

class BlogServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__.'/routes.php';
        $this->loadMigrationsFrom(__DIR__.'/migrations');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Onestartup\Blog\Controller\AdminBlogController');
        $this->app->make('Onestartup\Blog\Controller\CategoryController');
        $this->app->make('Onestartup\Blog\Controller\TagCatalogController');
        $this->app->make('Onestartup\Blog\Controller\BlogController');
        $this->loadViewsFrom(__DIR__.'/views', 'blog');
    }
}
