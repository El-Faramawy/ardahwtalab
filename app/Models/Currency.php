<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $table='currency';
    protected $guarded = ['id'];
	protected $hidden = ['created_at','updated_at'];
}