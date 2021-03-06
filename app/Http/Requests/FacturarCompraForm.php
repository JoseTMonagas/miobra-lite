<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FacturarCompraForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'obra_id' => 'sometimes|required_without:orden_compra_id|exists:obras,id',
            'orden_compra_id' => 'sometimes|required_without:obra_id|exists:orden_compras,id',
            'tipo_documento' => 'required',
            'productos' => 'required|array|min:1',
            'productos.*.producto_id' => 'required|exists:productos,id',
            'productos.*.cuenta_id' => 'required|exists.cuentas,id',
            'productos.*.cantidad' => 'required|integer',
            'productos.*.precio' => 'required|integer',
        ];
    }
}
