<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GetClienteObraController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $clientes = \App\Cliente::all();
        $obras = \App\Obra::all();

        return response()->json([$clientes, $obras]);
    }
}
