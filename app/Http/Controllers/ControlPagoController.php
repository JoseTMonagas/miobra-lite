<?php

namespace App\Http\Controllers;

use App\ControlPago;
use App\Http\Requests\GenericTypeForm;
use Illuminate\Http\Request;

class ControlPagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagos = ControlPago::all();

        return view('control/control_pago/index')->with(compact('pagos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('control/control_pago/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GenericTypeForm $request)
    {
        $pago = ControlPago::create($request->validated());
        $continue = $request->validated()['continue'];

        if ($continue) {
            return redirect()->back()->with(compact('pago'));
        } else {
            return redirect()->route('controles-pago.index')->with(compact('pago'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ControlPago  $controlPago
     * @return \Illuminate\Http\Response
     */
    public function show(ControlPago $controlPago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ControlPago  $controlPago
     * @return \Illuminate\Http\Response
     */
    public function edit(ControlPago $controlesPago)
    {
        $controlPago = $controlesPago;
        return view('control/control_pago/edit')->with(compact('controlPago'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ControlPago  $controlPago
     * @return \Illuminate\Http\Response
     */
    public function update(GenericTypeForm $request, ControlPago $controlPago)
    {
        $controlPago = $controlPago->update($request->validated());

        return redirect()->route('controles-pago.index')->with(compact('controlPago'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ControlPago  $controlPago
     * @return \Illuminate\Http\Response
     */
    public function destroy(ControlPago $controlPago)
    {
        $deleted = $controlPago->delete();

        return redirect()->route('controles-pago.index')->with(compact('deleted'));
    }
}
