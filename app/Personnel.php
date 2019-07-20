<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    protected $fillable = [
        'inn','last_name','name','patronymic', 'email','address','passport',
        'specialty','phone','birth_date','employment_date','dismissal_date','description','email','user_id'
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
