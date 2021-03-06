<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'code','name','discr','price','packing','user_id'
    ];

    public function User()
    {
        return $this->belongsTo('App\User');
    }

    public function listStorages()
    {
        return $this->hasMany('App\ListStorage');
    }

    public function listProducts()
    {
        return $this->hasMany('App\ListProduct');
    }
}
