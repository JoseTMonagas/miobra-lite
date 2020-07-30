<?php

namespace App\Http\Controllers;

use App\Cuenta;
use App\Http\Requests\CuentaForm;
use Illuminate\Http\Request;

class CuentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cuentas = Cuenta::all();

        return view('control/cuenta/index')->with(compact('cuentas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos = \App\TipoCuenta::all();

        return view('control/cuenta/create')->with(compact('tipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CuentaForm $request)
    {
        $cuenta = Cuenta::create($request->validated());
        $continue = $request->validated()['continue'];

        if ($continue) {
            return redirect()->back()->with(compact('cuenta'));
        } else {
            return redirect()->route('cuentas.index')->with(compact('cuenta'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cuenta  $cuenta
     * @return \Illuminate\Http\Response
     */
    public function show(Cuenta $cuenta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cuenta  $cuenta
     * @return \Illuminate\Http\Response
     */
    public function edit(Cuenta $cuenta)
    {
        $tipos = \App\TipoCuenta::all();

        return view('control/cuenta/edit')->with(compact('cuenta', 'tipos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cuenta  $cuenta
     * @return \Illuminate\Http\Response
     */
    public function update(CuentaForm $request, Cuenta $cuenta)
    {
        $cuenta = $cuenta->update($request->validated());
        $continue = $request->validated()['continue'];

        if ($continue) {
            return redirect()->back()->with(compact('cuenta'));
        } else {
            return redirect()->route('cuentas.index')->with(compact('cuenta'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cuenta  $cuenta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cuenta $cuenta)
    {
        $deleted = $cuenta->delete();

        return redirect()->route('cuentas.index')->with(compact('deleted'));
    }
}
