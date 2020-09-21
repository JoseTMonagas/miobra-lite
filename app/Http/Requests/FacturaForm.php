<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FacturaForm extends FormRequest
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
            'banco_id' => 'required|exists:bancos,id',
            'tipo_pago' => 'required|string',
            'fecha_documento' => 'required|date',
            'monto' => 'required|string',
            'folio_documento' => 'required|string',
        ];
    }
}
