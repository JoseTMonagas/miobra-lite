<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmpresaForm;

class EmpresaController extends Controller
{
    public function show()
    {
        $empresa = [];
        $empresa['razon_social'] = config('empresa.razon_social');
        $empresa['giro'] = config('empresa.giro');
        $empresa['rut'] = config('empresa.rut');
        $empresa['direccion'] = config('empresa.direccion');
        $empresa['comuna'] = config('empresa.comuna');
        $empresa['correo'] = config('empresa.correo');
        $empresa['telefono'] = config('empresa.telefono');

        return view('control/empresa/show')->with(compact('empresa'));
    }

    public function update(EmpresaForm $request)
    {
        $empresa = $request->validated();
        foreach($empresa as $key => $value) {
            config(["empresa.$key" => $value]);
        }

        return redirect()->route('empresa.show');
    }
}
