<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkingShift extends Model
{
    protected $fillable = [
       'date','time_start','time_end','list_personnel','discr','user_id'
    ];

    protected $casts = [
        'list_personnel' => 'array',
    ];


    public function listPersonnel()
    {
        return $this->hasOne('App\ListPersonnel');
    }

    public function listProduct()
    {
        return $this->hasOne('App\ListProduct');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}