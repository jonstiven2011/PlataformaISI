<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClaseRequest extends FormRequest
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
               //Para video ($mime == "video/x-flv" || $mime == "video/mp4" || $mime == "application/x-mpegURL" || $mime == "video/MP2T" || $mime == "video/3gpp" || $mime == "video/quicktime" || $mime == "video/x-msvideo" || $mime == "video/x-ms-wmv")
        //$this->method('put')
        //this->method() == 'PUT'
        if($this->method() == 'PUT'){
            return [
                //
                'name'            => 'required|min:10',
                'description'     => 'required',
                'curso_id'        => 'required',

            ];
        }else{

            return [
                'name'            => 'required|min:10',
                'description'     => 'required',
                'curso_id'        => 'required'
            ];
        }
    }

    public function messages()
    {
        return[
            'name.required'         => 'El campo Nombre Clase es obligatorio',
            'description.required'  => 'El campo Descripción es obligatorio',
            'curso_id'              => 'El campo Curso es obligatorio'
        ];
        
    }
}
