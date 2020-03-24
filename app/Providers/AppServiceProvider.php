<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Product
        $this->app->singleton(\App\Repositories\Product\IProductRepository::class, \App\Repositories\Product\ProductRepository::class);
        $this->app->singleton(\App\Services\Product\IProductService::class, \App\Services\Product\ProductService::class);

        // Image
        $this->app->singleton(\App\Repositories\Image\IImageRepository::class, \App\Repositories\Image\ImageRepository::class);
        $this->app->singleton(\App\Services\Image\IImageService::class, \App\Services\Image\ImageService::class);

        // User
        $this->app->singleton(\App\Repositories\User\IUserRepository::class, \App\Repositories\User\UserRepository::class);
        $this->app->singleton(\App\Services\User\IUserService::class, \App\Services\User\UserService::class);

        // Category
        $this->app->singleton(\App\Repositories\Category\ICategoryRepository::class, \App\Repositories\Category\CategoryRepository::class);
        $this->app->singleton(\App\Services\Category\ICategoryService::class, \App\Services\Category\CategoryService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
