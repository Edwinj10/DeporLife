<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
	protected $fillable = ['image','publicacio_id'];
	
	public function fileart()
	{
		return $this->belongsTo('App\Publicacio','publicacio_id','id');
	}
	// public function posts()
	// {
	// 	return $this->belongsToMany(Publicacio::class);
	// }
}
