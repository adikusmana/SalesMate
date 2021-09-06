<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['vendor_id',
                        'site_id',
                        'user_id',
                        'department_id',
                        'subdepartment_id',
                        'brand_id',
                        'transdate',
                        'transtime',
                        'transid',
                        'plu',
                        'price',
                        'qty',
                        'amount',
                        'margin',
                    ];

    public function vendors()
    {
        return $this->belongsTo('App\Vendor', 'vendor_id');
    }

    public function sites()
    {
        return $this->belongsTo('App\Site', 'site_id');
    }

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function departments()
    {
        return $this->belongsTo('App\Department', 'department_id');
    }

    public function subdepartments()
    {
        return $this->belongsTo('App\Subdepartment', 'subdepartment_id');
    }

    public function brands()
    {
        return $this->belongsTo('App\Brand', 'brand_id');
    }
}
