<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable  = [ 'code', 'name', 'note'];

    public function subdepartments()
    {
        return $this->hasMany('App\Subdepartment');
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
