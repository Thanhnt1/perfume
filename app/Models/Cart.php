<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/**
 * @property int $id
 * @property int $customer_id
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * @property Customer $customer
 * @property CartProduct[] $cartProducts
 * @property Customer[] $customers
 */
class Cart extends Base implements AuditableContract
{
    use Uuids, Auditable;
    
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'cart';

    /**
     * @var array
     */
    protected $fillable = ['customer_id', 'deleted_at', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cartProducts()
    {
        return $this->belongsToMany('App\Models\Product')->withPivot('id', 'value', 'quantity', 'unit_id')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function customers()
    {
        return $this->hasMany('App\Models\Customer');
    }
}
