<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contactus extends Model
{
    protected $table='contactus';
    protected $guarded = ['id'];
	protected $hidden = ['created_at','updated_at'];
}
