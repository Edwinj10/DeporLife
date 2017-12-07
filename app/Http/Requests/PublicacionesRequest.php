<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublicacionesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            
            'titulo' => 'required|max:100',
            // 'detalles' => 'required|max:100',
            'resumen' => 'required|max:100',
            'descripcion' => 'required',
            'foto'=> 'mimes:jpeg,bmp,png',
            
        ];
    }
}
