<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

class StudentRequest extends FormRequest
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
        $rules = [
            'nombre' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'email' => 'required',
            'carnet_identidad' => 'required',
            'n_celular' => 'required',
            'estado' => 'required|in:estudiante,profesional',
        ];

            if($this->costo_e > 0){
                $rules = array_merge($rules, [
                    'n_deposito' => 'required',
                    'img_deposito' => 'required|image|max:2048'
                ]);   
            }

        return $rules;
    }
    public function messages()
    {
        return [
            'nombre.required' => 'El nombre o los nombres del interesado son requeridos !!!',
            'apellido_paterno.required' => 'El apellido paterno es requerido.',
            'apellido_materno.required' => 'El apellido materno es requerido.',
            'email.required' => 'El correo electrónico es requerido.',
            'carnet_identidad.required' => 'El número de carnet de identidad es requerido.',
            'n_celular.required' => 'El número de celular es requerido.',
            'n_deposito.required' => 'El numero de deposito o número de comprobante es requerido.',
            'img_deposito.required' => 'La imagen del deposito o trasferencia es requerido.'
        ];
    }
}
