<?php

namespace App\Http\Controllers;

use App\Obra;
use App\Http\Requests\ObraForm;
use Illuminate\Http\Request;

class ObraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obras = Obra::all();

        return view('control/obra/index')->with(compact('obras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = \App\Cliente::all();
        $estados = \App\EstadoObra::all();

        return view('control/obra/create')->with(compact('clientes', 'estados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ObraForm $request)
    {
        $obra = Obra::create($request->validated());

        $continue = $request->validated()['continue'];

        if ($continue) {
            return redirect()->back()->with(compact('obra'));
        } else {
            return redirect()->route('obras.index')->with(compact('obra'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Obra  $obra
     * @return \Illuminate\Http\Response
     */
    public function show(Obra $obra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Obra  $obra
     * @return \Illuminate\Http\Response
     */
    public function edit(Obra $obra)
    {
        $clientes = \App\Cliente::all();
        $estados = \App\EstadoObra::all();

        return view('control/obra/edit')->with(compact('clientes', 'obra', 'estados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Obra  $obra
     * @return \Illuminate\Http\Response
     */
    public function update(ObraForm $request, Obra $obra)
    {
        $obra = $obra->update($request->validated());

        return redirect()->route('obras.index')->with(compact('obra'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Obra  $obra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Obra $obra)
    {
        $deleted = $obra->delete();

        return redirect()->route('obras.index')->with(compact('deleted'));
    }
}
