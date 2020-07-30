<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ObraForm extends FormRequest
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
            'nombre' => 'required',
            'descripcion' => 'required',
            'fecha_inicio' => 'required|date',
            'fecha_termino' => 'required|date',
            'plazo' => 'required|integer',
            'trato_tipo' => 'required|in:"licitacion","contrato","orden_compra","otro"',
            'trato_ref' => 'required|alpha_num',
            'trato_nombre' => 'required',
            'contacto_nombre' => 'required',
            'contacto_telefono' => 'sometimes|required_without:contacto_correo',
            'contacto_correo' => 'sometimes|required_without:contacto_telefono',
            'responsable_nombre' => 'required',
            'responsable_telefono' => 'sometimes|required_without:responsable_correo',
            'responsable_correo' => 'sometimes|required_without:responsable_telefono',
            'supervisor_nombre' => 'required',
            'supervisor_telefono' => 'sometimes|required_without:supervisor_correo',
            'supervisor_correo' => 'sometimes|required_without:supervisor_telefono',
            'ciudad' => 'required',
            'comuna' => 'required',
            'ubicacion' => 'sometimes',
            'latitud' => 'sometimes',
            'longitud' => 'sometimes',
            'cliente_id' => 'required|exists:clientes,id',
            'continue' => 'sometimes|integer',
            'estado_obra_id' => 'required|exists:estado_obras,id'
        ];
    }
}
