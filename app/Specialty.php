<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    protected $fillable = [
        'name_special','discr_special','tariff','hourly','user_id','user_id'
    ];
    public function User()
    {
        return $this->belongsTo('App\User');
    }
}
