<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListStorage extends Model
{
    //список складів з навною продукцією
    protected $fillable = [
        'products_id','quantity','storage_id'
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function storage()
    {
        return $this->belongsTo('App\Storage');
    }

}
