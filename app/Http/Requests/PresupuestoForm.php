<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PresupuestoForm extends FormRequest
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
            'cuentas' => 'required|array|min:1',
            'cuentas.*.cuenta_id' => 'required|exists:cuentas,id',
            'cuentas.*.costo' => 'required',
            'cuentas.*.neto' => 'required'
        ];
    }
}
