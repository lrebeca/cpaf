<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;

        // if($this->user_id == auth()->user()->id){
        //     return true;
        // }else{
        //     return false;
        // }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'evento' => 'required',
            'estado' => 'required|in:1,2,3',
        ];

        if($this->estado == 2){
            $rules = array_merge($rules, [
                'fecha_inicio' => 'required|date|after:tomorrow',
                'fecha_fin' => 'required|after_or_equal:fecha_inicio',
                'detalle' => 'required',
                //'imagen' => 'required',
                'id_organizador' => 'required',
                'province_id' => 'required',
            ]);
        }
        if($this->estado == 3){
            $rules = array_merge($rules, [
                'detalle' => 'required',
                'fecha_fin' => 'required|after_or_equal:fecha_inicio',
                'id_organizador' => 'required',
                'province_id' => 'required',
            ]);
        }
        return $rules;
    }
        public function messages()
    {
        return [
            'evento.required' => 'El nombre del evento es requerido !!!',
            'estado.required' => 'El estado es requerido !!!',
            'detalle.required' => 'El detalle del evento es requerido para publicarlo !!!',
            'fecha_inicio.required' => 'La fecha de inicio es requerido y debe ser superior a la fecha de mañana.',
            'fecha_fin.required' => 'La fecha de finalización debe ser superior a la fecha de inicio.',
            'imagen.required' => 'La imagen para el evento es requerido para publicarlo.',
            'id_organizador.required' => 'La unidad organizadora es requerido',
            'province_id.required' => 'La provincia es requerido',
        ];
    }
}
