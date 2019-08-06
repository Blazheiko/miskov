<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkingShift extends Model
{
    protected $fillable = [
       'date','time_start','time_end','list_personnel','list_product','list_of_works','discr','user_id'
    ];

    protected $casts = [
        'list_personnel' => 'array',
        'list_product' => 'array',
        'list_of_works' => 'array'
    ];


    public function listPersonnel()
    {
        return $this->hasOne('App\ListPersonnel');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
