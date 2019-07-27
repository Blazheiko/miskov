<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListProduct extends Model
{
    //модель для продукції виробленої за зміну
    protected $fillable = [
        'working_shifts_id','products_id','quantity','storage'
    ];

    public function workingShift()
    {
        return $this->belongsTo('App\WorkingShift');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

}
