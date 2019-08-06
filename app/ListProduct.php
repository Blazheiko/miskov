<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListProduct extends Model
{
    //модель для продукції виробленої за зміну
    protected $fillable = [
        'products_id','quantity','storage'
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

}
