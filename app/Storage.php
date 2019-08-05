<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
    protected $fillable = [
        'name','descr','places','user_id'
    ];

    public function listStorages()
    {
        return $this->hasMany('App\ListStorage');
    }

    public function User()
    {
        return $this->belongsTo('App\User');
    }


}
