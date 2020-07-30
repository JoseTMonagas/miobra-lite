<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenericTypeForm;
use App\TipoCuenta;
use Illuminate\Http\Request;

class TipoCuentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cuentas = TipoCuenta::all();

        return view('control/tipo_cuenta/index')->with(compact('cuentas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('control/tipo_cuenta/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GenericTypeForm $request)
    {
        $cuenta = TipoCuenta::create($request->validated());
        $continue = $request->validated()['continue'];

        if ($continue) {
            return redirect()->back()->with(compact('cuenta'));
        } else {
            return redirect()->route('tipos-cuenta.index')->with(compact('cuenta'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoCuenta  $tipoCuenta
     * @return \Illuminate\Http\Response
     */
    public function show(TipoCuenta $tipoCuenta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoCuenta  $tipoCuenta
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoCuenta $tipoCuenta)
    {
        return view('control/tipo_cuenta/edit')->with(compact('tipoCuenta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoCuenta  $tipoCuenta
     * @return \Illuminate\Http\Response
     */
    public function update(GenericTypeForm $request, TipoCuenta $tipoCuenta)
    {
        $tipoCuenta = $tipoCuenta->update($request->validated());

        return redirect()->route('tipos-cuenta.index')->with(compact('tipoCuenta'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoCuenta  $tipoCuenta
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoCuenta $tipoCuenta)
    {
        $deleted = $tipoCuenta->delete();

        return redirect()->route('tipos-cuenta.index')->with(compact('deleted'));
    }
}
