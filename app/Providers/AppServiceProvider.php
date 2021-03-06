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

        // Property
        $this->app->singleton(\App\Repositories\Property\IPropertyRepository::class, \App\Repositories\Property\PropertyRepository::class);
        $this->app->singleton(\App\Services\Property\IPropertyService::class, \App\Services\Property\PropertyService::class);

        // Unit
        $this->app->singleton(\App\Repositories\Unit\IUnitRepository::class, \App\Repositories\Unit\UnitRepository::class);
        $this->app->singleton(\App\Services\Unit\IUnitService::class, \App\Services\Unit\UnitService::class);

        // Supplier
        $this->app->singleton(\App\Repositories\Supplier\ISupplierRepository::class, \App\Repositories\Supplier\SupplierRepository::class);
        $this->app->singleton(\App\Services\Supplier\ISupplierService::class, \App\Services\Supplier\SupplierService::class);

        // Comment
        $this->app->singleton(\App\Repositories\Comment\ICommentRepository::class, \App\Repositories\Comment\CommentRepository::class);
        $this->app->singleton(\App\Services\Comment\ICommentService::class, \App\Services\Comment\CommentService::class);

        // Cart
        $this->app->singleton(\App\Repositories\Cart\ICartRepository::class, \App\Repositories\Cart\CartRepository::class);
        $this->app->singleton(\App\Services\Cart\ICartService::class, \App\Services\Cart\CartService::class);

        // Sale
        $this->app->singleton(\App\Repositories\Sale\ISaleRepository::class, \App\Repositories\Sale\SaleRepository::class);
        $this->app->singleton(\App\Services\Sale\ISaleService::class, \App\Services\Sale\SaleService::class);

        // Shipping Department 
        $this->app->singleton(\App\Repositories\ShippingDepartment\IShippingDepartmentRepository::class, \App\Repositories\ShippingDepartment\ShippingDepartmentRepository::class);
        $this->app->singleton(\App\Services\ShippingDepartment\IShippingDepartmentService::class, \App\Services\ShippingDepartment\ShippingDepartmentService::class);

        // Type Shipping
        $this->app->singleton(\App\Repositories\TypeShipping\ITypeShippingRepository::class, \App\Repositories\TypeShipping\TypeShippingRepository::class);
        $this->app->singleton(\App\Services\TypeShipping\ITypeShippingService::class, \App\Services\TypeShipping\TypeShippingService::class);

        // Bill
        $this->app->singleton(\App\Repositories\Bill\IBillRepository::class, \App\Repositories\Bill\BillRepository::class);
        $this->app->singleton(\App\Services\Bill\IBillService::class, \App\Services\Bill\BillService::class);
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
