<?php

namespace App\Http\Controllers;

use App\Factura;
use App\Http\Requests\FacturaForm;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facturas = Factura::all();

        return view('control/factura/index')->with(compact('facturas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bancos = \App\Banco::all();

        return view('control/factura/create')->with(compact('bancos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FacturaForm $request)
    {
        $factura = Factura::create($request->validated());
        $continue = $request->validated()['continue'];

        if (boolval($continue)) {
            return redirect()->back()->with(compact('factura'));
        } else {
            return redirect()->route('cobranzas.index')->with(compact('factura'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function show(Factura $factura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function edit(Factura $factura)
    {
        $bancos = \App\Banco::all();

        return view('control/factura/edit')->with(compact('bancos', 'factura'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function update(FacturaForm $request, Factura $factura)
    {
        $factura = $factura->update($request->validated());

        return redirect()->route('cobranzas.index')->with(compact('factura'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Factura $factura)
    {
        $deleted = $factura->delete();

        return redirect()->route('cobranzas.index')->with(compact('deleted'));
    }
}
