<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Personnel;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','brigadier','accountant'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function person()
    {
        return $this->hasOne('App\Personnel');
    }

    public function specialtys()
    {
        return $this->hasMany('App\Specialty');
    }

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function listPersonnels()
    {
        return $this->hasMany('App\ListPersonnel');
    }

    public function workingShifts()
    {
        return $this->hasMany('App\ListPersonnel');
    }
}
