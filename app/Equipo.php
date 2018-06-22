<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $fillable = [
        'nombre', 'logo', 'uniforme', 'estadio', 'plantilla', 'apodo', 'sitio_web', 'pais', 'historia', 'descripcion', 'nombre_estadio', 'ligas_id'
    ];
}
