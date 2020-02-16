<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $cart_id
 * @property string $name
 * @property string $email
 * @property string $email_verified_at
 * @property string $password
 * @property string $phone
 * @property string $sex
 * @property string $remember_token
 * @property string $avatar_url
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * @property Cart $cart
 * @property Bill[] $bills
 * @property Cart[] $carts
 */
class Customer extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'customer';

    /**
     * @var array
     */
    protected $fillable = ['cart_id', 'name', 'email', 'email_verified_at', 'password', 'phone', 'sex', 'remember_token', 'avatar_url', 'deleted_at', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cart()
    {
        return $this->belongsTo('App\Models\Cart');
    }

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
    public function carts()
    {
        return $this->hasMany('App\Models\Cart');
    }
}