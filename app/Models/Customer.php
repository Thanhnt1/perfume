<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
class Customer extends Authenticatable implements AuditableContract
{
    use Uuids, Auditable;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'customer';
    protected $guard = 'customer';

    /**
     * @var array
     */
    protected $fillable = ['cart_id', 'name', 'email','provider', 'provider_id', 'email_verified_at', 'password', 'phone', 'sex', 'remember_token', 'avatar', 'location', 'deleted_at', 'created_at', 'updated_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cart()
    {
        return $this->hasOne('App\Models\Cart');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bills()
    {
        return $this->hasMany('App\Models\Bill');
    }

    public function getName()
    {
        return $this->name;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
}
