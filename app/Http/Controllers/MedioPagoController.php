<?php

namespace App\Http\Controllers;

use App\MedioPago;
use Illuminate\Http\Request;

class MedioPagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagos = MedioPago::all();

        return view('control/medio_pago/index')->with(compact('pagos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('control/medio_pago/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GenericTypeForm $request)
    {
        $pago = MedioPago::create($request->validated());
        $continue = $request->validated()['continue'];

        if ($continue) {
            return redirect()->back()->with(compact('pago'));
        } else {
            return redirect()->route('medios-pago.index')->with(compact('pago'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MedioPago  $medioPago
     * @return \Illuminate\Http\Response
     */
    public function show(MedioPago $medioPago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MedioPago  $medioPago
     * @return \Illuminate\Http\Response
     */
    public function edit(MedioPago $medioPago)
    {
        return view('control/medio_pago/edit')->with(compact('medioPago'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MedioPago  $medioPago
     * @return \Illuminate\Http\Response
     */
    public function update(GenericTypeForm $request, MedioPago $medioPago)
    {
        $medioPago = $medioPago->update($request->validated());

        return redirect()->route('medios-pago.index')->with(compact('medioPago'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MedioPago  $medioPago
     * @return \Illuminate\Http\Response
     */
    public function destroy(MedioPago $medioPago)
    {
        $deleted = $medioPago->delete();

        return redirect()->route('medios-pago.index')->with(compact('deleted'));
    }
}
