<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Sluggable;

class Publicacion extends Model
{
	

	public function sluggable()
	{
		return [
			'slug' => [
				'source' => 'titulo'
			]
		];
	}

	protected $fillable= ['titulo', 'descripcion','foto', 'slug', 'importante', 'tipo', 'user_id', 'categoria_id', 'fecha', 'total_visitas'];
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
