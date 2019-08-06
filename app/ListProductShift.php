<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListProductShift extends Model
{
    protected $fillable = [
        'products_id','listStorages'
    ];

    protected $casts = [
        'listStorages' => 'array',
    ];

}
