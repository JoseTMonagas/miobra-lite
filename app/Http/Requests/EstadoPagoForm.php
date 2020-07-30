<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstadoPagoForm extends FormRequest
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
            'obra_id' => 'required|exists:obras,id',
            'control_pago_id' => 'required|exists:control_pagos,id',
            'porcentaje' => 'required|integer',
            'descripcion' => 'required',
            'monto' => 'required|integer',
            'fecha_emision' => 'required|date',
            'fecha_pago' => 'required|date'
        ];
    }
}
