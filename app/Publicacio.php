<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publicacio extends Model
{
	protected $fillable= ['titulo', 'descripcion','foto', 'importante', 'tipo', 'total_visitas', 'user_id', 'categoria_id', 'slug', 'resumen'];
	protected $primarykey='id';

	protected $dates = [
		'created_at', 
		'updated_at'
	];


	public function users()
	{

		return $this->belongsTo(User::class);
	}
	public function formattedDate()
	{
		return $this->created_at->format('M d Y');
	}
}
