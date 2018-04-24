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


        if (is_dir(base_path() . '/resources/views/vendor/onestartup/blog')) {

            $this->loadViewsFrom(base_path() . '/resources/views/vendor/onestartup/blog', 'blog-public');
            $this->loadViewsFrom(__DIR__.'/views', 'blog');

        } else {
           
            $this->loadViewsFrom(__DIR__.'/views', 'blog');
            $this->loadViewsFrom(__DIR__.'/views/post', 'blog-public');
        }

        $this->publishes([
            __DIR__.'/views/post' => resource_path('views/vendor/onestartup/blog'),
        ]);



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
        
    }
}
