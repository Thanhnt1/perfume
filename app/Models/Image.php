<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $product_id
 * @property string $url
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * @property Product $product
 */
class Image extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'images';

    /**
     * @var array
     */
    protected $fillable = ['product_id', 'url', 'deleted_at', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
