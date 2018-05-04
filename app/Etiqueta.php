<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etiqueta extends Model
{
	protected $fillable= ['etiqueta'];
	protected $primarykey='id';

	// public function publicacios()
	// {
	// 	return $this->belongsToMany(Publicacio::class);
	// }
	 public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
