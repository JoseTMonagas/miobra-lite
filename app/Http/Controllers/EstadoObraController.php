<?php

namespace App\Http\Controllers;

use App\EstadoObra;
use App\Http\Requests\GenericTypeForm;

class EstadoObraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estadoObras = EstadoObra::all();

        return view('control/estado_obra/index')->with(compact('estadoObras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('control/estado_obra/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GenericTypeForm $request)
    {
        $estadoObra = EstadoObra::create($request->validated());
        $continue = $request->validated()['continue'];

        if ($continue) {
            return redirect()->back()->with(compact(''));
        } else {
            return redirect()->route('estados-obras.index')->with(compact('estadoObra'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EstadoObra  $estadoObra
     * @return \Illuminate\Http\Response
     */
    public function show(EstadoObra $estadoObra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EstadoObra  $estadoObra
     * @return \Illuminate\Http\Response
     */
    public function edit(EstadoObra $estadoObra)
    {
        return view('control/estado_obra/edit')->with(compact('estadoObra'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EstadoObra  $estadoObra
     * @return \Illuminate\Http\Response
     */
    public function update(GenericTypeForm $request, EstadoObra $estadoObra)
    {
        $estadoObra = $estadoObra->update($request->validated());

        return redirect()->route('estado-obras.index')->with(compact('estadoObra'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EstadoObra  $estadoObra
     * @return \Illuminate\Http\Response
     */
    public function destroy(EstadoObra $estadoObra)
    {
        $deleted = $estadoObra->delete();

        return redirect()->route('estado-obras.index')->with(compact('deleted'));
    }
}
