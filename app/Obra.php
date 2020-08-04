<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Obra extends Model
{
    use SoftDeletes;

    protected $appends = ['editRoute', 'deleteRoute'];

    protected $fillable = [
        'nombre', 'estado_obra_id', 'descripcion', 'fecha_inicio',
        'fecha_termino', 'plazo', 'estado',
        'trato_tipo', 'trato_ref', 'trato_nombre',
        'contacto_nombre', 'contacto_telefono', 'contacto_correo',
        'responsable_nombre', 'responsable_telefono', 'responsable_correo',
        'supervisor_nombre', 'supervisor_telefono', 'supervisor_correo',
        'ciudad', 'ubicacion', 'latitud', 'longitud', 'comuna'
    ];

    public function getEditRouteAttribute()
    {
        return route('obras.edit', $this->id);
    }

    public function getDeleteRouteAttribute()
    {
        return route('obras.destroy', $this->id);
    }

    public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }

    public function presupuesto()
    {
        return $this->hasOne('App\Presupuesto');
    }

    public function estado()
    {
        return $this->belongsTo('App\EstadoObra');
    }

    public function generarPdf()
    {

    }

}
