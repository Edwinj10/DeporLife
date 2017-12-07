<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Comentario extends Model
{
    protected $fillable= ['comentario', 'fecha','publicacion_id', 'user_id', 'estado'];
      	
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