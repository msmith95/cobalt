<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chore extends Model
{
    protected $fillable = [
        'name', 'description', 'frequency', 'apartment_id',
    ];

    public function apartment(){
    	return $this->belongsTo('App\Apartment');
    }

    public function user(){
    	return $this->belongsTo('App\User', 'assigned_user_id');
    }
}
