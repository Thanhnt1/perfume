<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $category_id
 * @property int $supplier_id
 * @property int $unit_id
 * @property string $name
 * @property int $status
 * @property int $quantity
 * @property float $import_price
 * @property float $selling_price
 * @property string $description
 * @property string $note
 * @property string $import_date
 * @property int $rate
 * @property string $image
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * @property Category $category
 * @property Unit $unit
 * @property Supplier $supplier
 * @property BillProduct[] $billProducts
 * @property CartProduct[] $cartProducts
 * @property Image[] $images
 * @property ProductProperty[] $productProperties
 * @property ProductReturn[] $productReturns
 * @property ProductSale[] $productSales
 */
class Product extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'products';

    /**
     * @var array
     */
    protected $fillable = ['category_id', 'supplier_id', 'unit_id', 'name', 'status', 'quantity', 'import_price', 'selling_price', 'description', 'note', 'import_date', 'rate', 'image', 'deleted_at', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Category', null, 'category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function unit()
    {
        return $this->belongsTo('App\Unit');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function supplier()
    {
        return $this->belongsTo('App\Supplier');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function billProducts()
    {
        return $this->hasMany('App\BillProduct');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cartProducts()
    {
        return $this->hasMany('App\CartProduct');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany('App\Image');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productProperties()
    {
        return $this->hasMany('App\ProductProperty');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productReturns()
    {
        return $this->hasMany('App\ProductReturn');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productSales()
    {
        return $this->hasMany('App\ProductSale');
    }
}