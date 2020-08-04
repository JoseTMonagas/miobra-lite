<?php

namespace App\Http\Controllers;

use App\FacturaCompra;
use App\Http\Requests\FacturarCompraForm;
use Illuminate\Http\Request;

class FacturaCompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $ordenes = \App\OrdenCompra::all();
        $ordenes->load('productos');

        return view('control/factura_compra/create')->with(compact('productos', 'cuentas', 'ordenes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FacturarCompraForm $request)
    {
        $form = $request->validated();
        $facturaCompra = FacturaCompra::create($form);

        foreach ($form['productos'] as $producto) {
            $facturaCompra->productos()->attach($producto['producto_id'], $producto);
        }

        return response()->json(route('facturas.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FacturaCompra  $facturaCompra
     * @return \Illuminate\Http\Response
     */
    public function show(FacturaCompra $facturaCompra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FacturaCompra  $facturaCompra
     * @return \Illuminate\Http\Response
     */
    public function edit(FacturaCompra $facturaCompra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FacturaCompra  $facturaCompra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FacturaCompra $facturaCompra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FacturaCompra  $facturaCompra
     * @return \Illuminate\Http\Response
     */
    public function destroy(FacturaCompra $facturaCompra)
    {
        //
    }
}
