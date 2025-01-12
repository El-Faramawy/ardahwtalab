<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Claims extends Model
{
    protected $table='claims';
    protected $guarded = ['id'];
	// protected $hidden = ['created_at','updated_at'];

	public function advs(){
		return $this->belongsTo('App\Models\Advs');
	}
	public function user(){
		return $this->belongsTo('App\Models\User');
	}
	public function comment(){
		return $this->belongsTo('App\Models\Comments');
	}
}
