<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * @property Bill[] $bills
 * @property Return[] $returns
 */
class ShippingDepartment extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'shipping_department';

    /**
     * @var array
     */
    protected $fillable = ['name', 'phone', 'email', 'deleted_at', 'created_at', 'updated_at'];

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
    public function returns()
    {
        return $this->hasMany('App\Models\Return');
    }
}
