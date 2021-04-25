<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteFormRequest extends FormRequest
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
            'nit'=>'required|max:45',
            'nombre'=>'required|max:45',
            'fecha_nacimiento'=>'required',
            'edad'=>'required',
            'correo'=>'required|max:45',
            'telefono'=>'required|max:45',
            'id_categoria'=>'required',
            'id_genero'=>'required',
            'id_departamento'=>'required'
        ];
    }
}
