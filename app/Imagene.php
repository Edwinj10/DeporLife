<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagene extends Model
{
    protected $fillable= ['titulo', 'descripcion','foto', 'user_id'];
      	protected $primarykey='id';

	public function users()
	    {

	        return $this->belongsTo(User::class);
	    }

}
