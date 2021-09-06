<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',  'email', 'password', 'role_id', 'site_id',
    ];

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

    public function sites()
    {
        return $this->belongsTo('App\Site', 'site_id');
    }

    public function brands()
    {
        return $this->belongsTo('App\Brand', 'brand_id');
    }

    public function vendors()
    {
        return $this->belongsTo('App\Vendor', 'vendor_id');
    }

    public function departments()
    {
        return $this->belongsTo('App\Department', 'department_id');
    }

    public function subdepartments()
    {
        return $this->belongsTo('App\Subdepartment', 'subdepartment_id');
    }

    public function transactions()
    {
        return $this->hasMany('App/Transaction');
    }
}
