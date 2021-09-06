<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $fillable = ['name', 'note'];

    public function users()
    {
        return $this->hasMany('App\User');
    }
    public function brands()
    {
        return $this->hasMany('App\Brand');
    }

    public function transactions()
    {
        return $this->hasMany('App/Transaction');
    }
}
