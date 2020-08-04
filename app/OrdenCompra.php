<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use PDF as TCPDF;

class OrdenCompra extends Model
{
    use SoftDeletes;

    protected $appends = ['editRoute', 'deleteRoute'];
    protected $fillable = ['obra_id', 'proveedor_id'];

    public function getEditRouteAttribute()
    {
        return route('ordenes_compra.edit', $this->id);
    }

    public function getDeleteRouteAttribute()
    {
        return route('ordenes_compra.destroy', $this->id);
    }

    public function obra()
    {
        return $this->belongsTo('App\Obra');
    }

    public function proveedor()
    {
        return $this->belongsTo('App\Proveedor');
    }

    public function productos()
    {
        return $this->belongsToMany('App\Producto')->withPivot(['cantidad', 'precio', 'cuenta_id']);
    }

    public function generarPdf()
    {
        $empresa = [];
        $empresa['razon_social'] = config('empresa.razon_social');
        $empresa['giro'] = config('empresa.giro');
        $empresa['rut'] = config('empresa.rut');
        $empresa['direccion'] = config('empresa.direccion');
        $empresa['comuna'] = config('empresa.comuna');
        $empresa['correo'] = config('empresa.correo');
        $empresa['telefono'] = config('empresa.telefono');

        $fecha = date("d-m-Y H:i:s");
        $cliente = $this->proveedor;

        TCPDF::SetFont('helvetica', '', 10);
        TCPDF::AddPage();
        TCPDF::setFillColor(255, 255, 255);
        TCPDF::MultiCell(120, 5, "{$empresa['razon_social']}\n{$empresa['giro']}\n{$empresa['direccion']}\n{$empresa['comuna']}\n{$empresa['correo']} - {$empresa['telefono']}", 0, 'L', 0, 0);
        TCPDF::MultiCell(0, 5, "{$empresa['comuna']}: $fecha\nFolio n°: {$this->id}", 1, 'C', 0, 0);

        TCPDF::ln(25);

        TCPDF::SetFont('helveticaB', '', 10);
        TCPDF::Cell(20, 5, "Cliente:", "BT");
        TCPDF::SetFont('helvetica', '', 10);
        TCPDF::Cell(75, 5, "{$cliente->razon_social}", "BTR");

        TCPDF::SetFont('helveticaB', '', 10);
        TCPDF::Cell(20, 5, "Rut:", "BT");
        TCPDF::SetFont('helvetica', '', 10);
        TCPDF::Cell(75, 5, "{$cliente->rut}", "BT", 1);

        TCPDF::SetFont('helveticaB', '', 10);
        TCPDF::Cell(20, 5, "Dirección:", "B");
        TCPDF::SetFont('helvetica', '', 10);
        TCPDF::Cell(75, 5, "{$cliente->direccion}", "BR");

        TCPDF::SetFont('helveticaB', '', 10);
        TCPDF::Cell(20, 5, "Comuna:", "B");
        TCPDF::SetFont('helvetica', '', 10);
        TCPDF::Cell(75, 5, "{$cliente->comuna}", "B", 1);

        TCPDF::SetFont('helveticaB', '', 10);
        TCPDF::Cell(20, 5, "Contacto:", "B");
        TCPDF::SetFont('helvetica', '', 10);
        TCPDF::Cell(75, 5, "{$cliente->correo}", "BR");

        TCPDF::SetFont('helveticaB', '', 10);
        TCPDF::Cell(20, 5, "Telefono:", "B");
        TCPDF::SetFont('helvetica', '', 10);
        TCPDF::Cell(75, 5, "{$cliente->telefono}", "B", 1);

        TCPDF::ln(5);

        TCPDF::Cell(15, 5, "Codigo", 1, 0, "C");
        TCPDF::Cell(60, 5, "Descripcion", "TRB", 0, "C");
        TCPDF::Cell(25, 5, "Cant.", "TRB", 0, "C");
        TCPDF::Cell(35, 5, "Precio", "TRB", 0, "C");
        TCPDF::Cell(35, 5, "Subtotal", "TRB", 1, "C");

        foreach($this->productos as $producto) {
            $insumo = \App\Producto::find($producto['producto_id']);
            $subtotal = $producto['precio'] * $producto['cantidad'];
            TCPDF::Cell(15, 5, "{$insumo->codigo}", 1, 0, "C");
            TCPDF::Cell(60, 5, "{$insumo->nombre}", "TRB", 0, "C");
            TCPDF::Cell(25, 5, "{$producto['cantidad']}", "TRB", 0, "C");
            TCPDF::Cell(35, 5, "{$producto['precio']}", "TRB", 0, "C");
            TCPDF::Cell(35, 5, "{$subtotal}", "TRB", 1, "C");
        }

        TCPDF::ln(10);

        TCPDF::SetFont('helvetica', '', 8);
        TCPDF::SetTextColor(66, 66, 66);

        TCPDF::Output('hello_world.pdf');
    }
}
