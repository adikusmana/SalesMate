<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $fillable = [
        'name',  'note', 'code',
    ];

    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function transactions()
    {
        return $this->hasMany('App/Transaction');
    }
}
