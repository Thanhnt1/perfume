<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $note
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * @property ProductProperty[] $productProperties
 */
class Property extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'properties';

    /**
     * @var array
     */
    protected $fillable = ['name', 'note', 'deleted_at', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productProperties()
    {
        return $this->hasMany('App\Models\ProductProperty');
    }
}
