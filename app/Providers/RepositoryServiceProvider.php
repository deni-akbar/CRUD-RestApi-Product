<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Register Interface and Repository in here
        // You must place Interface in first place
        // If you dont, the Repository will not get readed.
        $this->app->bind(
            'App\Interfaces\ProductInterface',
            'App\Repositories\ProductRepository'
        );
        $this->app->bind(
            'App\Interfaces\CategoryInterface',
            'App\Repositories\CategoryRepository'
        );
        $this->app->bind(
            'App\Interfaces\ImageInterface',
            'App\Repositories\ImageRepository'
        );
        $this->app->bind(
            'App\Interfaces\CategoryProductInterface',
            'App\Repositories\CategoryProductRepository'
        );
    }
}