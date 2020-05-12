<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property int $price
 * @property int $day_shipping_count
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * @property Bill[] $bills
 */
class TypeShipping extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'type_shipping';

    /**
     * @var array
     */
    protected $fillable = ['name' ,'shipping_department_id', 'price', 'day_shipping_count', 'deleted_at', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bills()
    {
        return $this->hasMany('App\Models\Bill');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shipping_department()
    {
        return $this->belongsTo('App\Models\ShippingDepartment');
    }
}
