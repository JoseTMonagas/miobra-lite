<?php

namespace App\Http\Controllers;

use App\OrdenCompra;
use App\Http\Requests\OrdenCompraForm;
use Illuminate\Http\Request;

class OrdenCompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ordenesCompra = OrdenCompra::all();

        return view('control/orden_compra/index')->with(compact('ordenesCompra'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos = \App\Producto::all();
        $cuentas = \App\Cuenta::all();

        return view('control/orden_compra/create')->with(compact('productos', 'cuentas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrdenCompraForm $request)
    {
        $form = $request->validated();
        $ordenCompra = OrdenCompra::create($form);

        foreach($form['productos'] as $producto) {
            $ordenCompra->productos()->attach($producto['producto_id'], $producto);
        }

        return response()->json(route('ordenes_compra.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OrdenCompra  $ordenCompra
     * @return \Illuminate\Http\Response
     */
    public function show(OrdenCompra $ordenCompra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OrdenCompra  $ordenCompra
     * @return \Illuminate\Http\Response
     */
    public function edit(OrdenCompra $ordenCompra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrdenCompra  $ordenCompra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrdenCompra $ordenCompra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrdenCompra  $ordenCompra
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrdenCompra $ordenCompra)
    {
        //
    }
}
