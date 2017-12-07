<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PortadaRequest extends FormRequest
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
            'titulo' => 'required|max:50',
            // 'detalles' => 'required|max:100',
            'descripcion' => 'required',
            'descripcion' => 'required',
            'resumen' => 'required|max:70',
            'foto'=> 'mimes:jpeg,bmp,png',
        ];
    }
}
