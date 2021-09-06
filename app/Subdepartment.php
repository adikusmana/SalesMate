<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subdepartment extends Model
{
    protected $fillable  = [ 'code', 'name', 'note', 'department_id'];

    public function departments()
    {
        return $this->belongsTo('App\Department', 'department_id');
    }
    public function brands()
    {
        return $this->hasMany('App\Brand');
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function transactions()
    {
        return $this->hasMany('App/Transaction');
    }
}
