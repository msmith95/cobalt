<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Chore extends Model
{
    protected $fillable = [
        'name', 'description', 'frequency', 'apartment_id', 'due_date',
    ];

    protected $dates = [
    	'due_date'
    ];

    public function scopeDue($query){
    	$query->where('due_date', '<=', Carbon::now('America/Chicago'));
    }

    public function setDueDate($date){
    	$this->attributes['due_date'] = Carbon::parse($date);
    }

    public function getDueDate($date){
    	return new Carbon($date);
    }

    public function apartment(){
    	return $this->belongsTo('App\Apartment');
    }

    public function user(){
    	return $this->belongsTo('App\User', 'assigned_user_id');
    }
}
