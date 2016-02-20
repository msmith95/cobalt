<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $fillable = [
        'name',
    ];

    public function user(){
    	return $this->hasMany('App\User');
    }

    public function chores(){
    	return $this->hasMany('App\Chore');
    }
}
