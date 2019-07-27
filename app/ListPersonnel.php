<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListPersonnel extends Model
{
    //модель для списка робітників в зміні та фіксаціх робочих часів

    protected $fillable = [
        'user_id','working_shifts_id','specialties_id','work_time','processed'
    ];


    public function workingShift()
    {
        return $this->belongsTo('App\WorkingShift');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function Specialty()
    {
        return $this->belongsTo('App\Specialty');
    }
}
