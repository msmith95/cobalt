<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $fillable = [
        'name'
    ];

    public function user(){
    	return $this->hasMany('App\User');
    }

    public function scopeDue($query){
        $query->where('due_date', '<=', Carbon::now('America/Chicago'));
    }

    public function chores(){
    	return $this->hasMany('App\Chore');
    }
}
