<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Comentario extends Model
{
    protected $fillable= ['id','user_id','publicacions_id' ,'comentario' , 'fecha','estado'];
      	
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