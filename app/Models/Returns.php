<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use App\Traits\Uuids;

/**
 * @property int $id
 * @property int $bill_id
 * @property int $shipping_department_id
 * @property int $admin_id
 * @property string $return_date
 * @property string $receive_date
 * @property int $status
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * @property Admin $admin
 * @property ShippingDeparment $shippingDeparment
 * @property Bill $bill
 * @property ProductReturn[] $productReturns
 */
class Returns extends Base implements AuditableContract
{
    use Uuids, Auditable;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'returns';

    /**
     * @var array
     */
    protected $fillable = ['bill_id', 'shipping_department_id', 'admin_id', 'return_date', 'receive_date', 'status', 'deleted_at', 'created_at', 'updated_at'];

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
    public function bill()
    {
        return $this->belongsTo('App\Models\Bill');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productReturns()
    {
        return $this->hasMany('App\Models\ProductReturn');
    }
}
