<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/**
 * @property int $id
 * @property int $customer_id
 * @property int $shipping_department_id
 * @property int $admin_id
 * @property int $type_shipping_id
 * @property float $total_price
 * @property int $payment_methods
 * @property string $note
 * @property int $status
 * @property float $total_discount
 * @property string $shipping_date
 * @property string $receive_date
 * @property string $recipient_name
 * @property string $recipient_phone
 * @property string $recipient_address
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * @property Admin $admin
 * @property ShippingDeparment $shippingDeparment
 * @property TypeShipping $typeShipping
 * @property Customer $customer
 * @property BillProduct[] $billProducts
 * @property Return[] $returns
 */
class Bill extends Base implements AuditableContract
{
    use Uuids, Auditable;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'bills';

    /**
     * @var array
     */
    protected $fillable = ['customer_id', 'shipping_department_id', 'admin_id', 'type_shipping_id', 'total_price', 'payment_methods', 'note', 'status', 'total_discount', 'shipping_date', 'receive_date', 'recipient_name', 'recipient_phone', 'recipient_address', 'deleted_at', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function admin()
    {
        return $this->belongsTo('App\Models\Admin');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shippingDeparment()
    {
        return $this->belongsTo('App\Models\ShippingDeparment');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function typeShipping()
    {
        return $this->belongsTo('App\Models\TypeShipping');
    }

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
    public function billProducts()
    {
        return $this->belongsToMany('App\Models\Product')->withPivot('quantity')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function returns()
    {
        return $this->hasMany('App\Models\Return');
    }
}
