<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'comments';

    /**
     * @var array
     */
    protected $fillable = ['product_id', 'description', 'rate', 'like', 'quanlity', 'choose', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }
}
