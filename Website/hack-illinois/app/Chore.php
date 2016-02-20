<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chore extends Model
{
    protected $fillable = [
        'name', 'description', 'frequency', 'apartment_id',
    ];
}
