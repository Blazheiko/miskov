<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListStoragesShift extends Model
{
    protected $fillable = [
        'storage_id','name','quantity'
    ];
}
