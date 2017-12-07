<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portada extends Model
{
      protected $fillable= ['titulo', 'descripcion', 'resumen','foto', 'tipo', 'user_id', 'categoria_id'];
      	protected $primarykey='id';

	public function users()
	    {

	        return $this->belongsTo(User::class);
	    }

	    public static function Portada()
	    {
	        
	        return DB::table('portadas')
	        ->select('descripcion','foto', 'titulo')
	        ->where('user_id', '=', 'Auth::user()->id')
	        ->get();
	    }
      
}
