<?php

namespace App\Http\Controllers;

use App\Presupuesto;
use App\Http\Requests\PresupuestoForm;
use Illuminate\Http\Request;

class PresupuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $presupuestos = \App\Obra::all()->load('presupuesto');

        return view('control/presupuesto/index')->with(compact('presupuestos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = \App\Cliente::all();
        $obras = \App\Obra::all();
        $cuentas = \App\Cuenta::all();

        return view('control/presupuesto/create')->with(compact('clientes', 'obras', 'cuentas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PresupuestoForm $request)
    {
        $validated = $request->validated();
        $presupuesto = Presupuesto::create($validated);
        foreach($validated['cuentas'] as $cuenta) {
            $presupuesto->cuentas()->attach($cuenta['cuenta_id'], ["costo" => $cuenta['costo'], "neto" => $cuenta['neto']]);
        }

        return response()->json(route("presupuestos.index"));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Presupuesto  $presupuesto
     * @return \Illuminate\Http\Response
     */
    public function show(Presupuesto $presupuesto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Presupuesto  $presupuesto
     * @return \Illuminate\Http\Response
     */
    public function edit(Presupuesto $presupuesto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Presupuesto  $presupuesto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Presupuesto $presupuesto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Presupuesto  $presupuesto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Presupuesto $presupuesto)
    {
        //
    }
}
