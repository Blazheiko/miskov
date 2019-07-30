<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
    protected $fillable = [
        'number','descr','places'
    ];

    public function listStorages()
    {
        return $this->hasMany('App\ListStorage');
    }

}
