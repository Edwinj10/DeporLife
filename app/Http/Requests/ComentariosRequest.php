<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComentariosRequest extends FormRequest
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
             'comentario' => 'required|max:150',
             // 'user_id' => 'required',
             // 'publicacions_id' => 'required',
             // 'estado' => 'required',
        ];
    }
    // public function messages()
    // {
    //     return [
    //         'comentario' => 'El campo Comentario es obligatorio',
    //         'user_id' => 'El campo User_id es obligatorio',
    //     ];
    // }
}
