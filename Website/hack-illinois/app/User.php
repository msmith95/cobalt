<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','apikey', 'apartment_id'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function apartment(){
        return $this->belongsTo('App\Apartment');
    }

    public function chores(){
        return $this->hasMany('App\Chore', 'assigned_user_id');
    }

    public function getCompletedPercentageAttribute()
    {
        return ($this->numberOfCompletedChores / ($this->numberOfCompletedChores + $this->numberOfIncompletedChores))*100;
    }
}
