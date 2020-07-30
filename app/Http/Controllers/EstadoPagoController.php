<?php

namespace App\Http\Controllers;

use App\EstadoPago;
use App\Http\Requests\EstadoPagoForm;
use Illuminate\Http\Request;

class EstadoPagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagos = EstadoPago::all();

        return view('control/estado_pago/index')->with(compact('pagos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $obras = \App\Obra::all();
        $controles = \App\ControlPago::all();

        return view('control/estado_pago/create')->with(compact('obras', 'controles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EstadoPagoForm $request)
    {
        $pago = EstadoPago::create($request->validated());
        $continue = $request->validated()['continue'];

        if ($continue) {
            return redirect()->back()->with(compact('pago'));
        } else {
            return redirect()->route('pagos.index')->with(compact('pago'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EstadoPago  $estadoPago
     * @return \Illuminate\Http\Response
     */
    public function show(EstadoPago $estadoPago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EstadoPago  $estadoPago
     * @return \Illuminate\Http\Response
     */
    public function edit(EstadoPago $estadoPago)
    {
        $obras = \App\Obra::all();
        $controles = \App\ControlPago::all();

        return view('control/estado_pago/edit')->with(compact('obras', 'estadoPago', 'controles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EstadoPago  $estadoPago
     * @return \Illuminate\Http\Response
     */
    public function update(EstadoPagoForm $request, EstadoPago $estadoPago)
    {
        $estadoPago = $estadoPago->update($request->validated());

        return redirect()->route('pagos.index')->with(compact('estadoPago'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EstadoPago  $estadoPago
     * @return \Illuminate\Http\Response
     */
    public function destroy(EstadoPago $estadoPago)
    {
        $deleted = $estadoPago->delete();

        return redirect()->route('pagos.index')->with(compact('deleted'));
    }
}
