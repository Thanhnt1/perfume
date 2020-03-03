<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Traits\Uuids;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class User extends Authenticatable implements AuditableContract
{
    use Notifiable, Uuids, Auditable;

    protected $table = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['role_id', 'name', 'email', 'email_verified_at', 'password', 'phone', 'sex', 'remember_token', 'avatar', 'deleted_at', 'created_at', 'updated_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo('App\Models\Models\Role');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bills()
    {
        return $this->hasMany('App\Models\Models\Bill');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function returns()
    {
        return $this->hasMany('App\Models\Models\Return');
    }
}
