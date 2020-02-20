<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $start_date
 * @property string $end_date
 * @property int $price
 * @property string $code
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * @property ProductSale[] $productSales
 */
class Sale extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'sales';

    /**
     * @var array
     */
    protected $fillable = ['start_date', 'end_date', 'price', 'code', 'deleted_at', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productSales()
    {
        return $this->hasMany('App\ProductSale');
    }
}
