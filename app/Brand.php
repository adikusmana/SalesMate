<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['vendor_id', 'subdepartment_id', 'name', 'note'];

    public function users()
    {
        return $this->hasMany('App/User');
    }
    public function subdepartments()
    {
        return $this->belongsTo('App\Subdepartment', 'subdepartment_id');
    }
    public function vendors()
    {
        return $this->belongsTo('App\Vendor', 'vendor_id');
    }

    public function departments()
    {
        return $this->belongsTo('App\Department', 'department_id');
    }

    public function transactions()
    {
        return $this->hasMany('App/Transaction');
    }
}
