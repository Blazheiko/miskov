<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    public function User()
    {
        return $this->belongsTo('App\User');
    }
}
