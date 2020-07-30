<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EstadoPago extends Model
{
    use SoftDeletes;

    protected $fillable = ['porcentaje', 'descripcion', 'monto', 'fecha_emision', 'fecha_pago'];
    protected $appends = ['editRoute', 'deleteRoute'];

    public function getEditRouteAttribute()
    {
        return route('pagos.edit', $this->id);
    }

    public function getDeleteRouteAttribute()
    {
        return route('pagos.destroy', $this->id);
    }

    public function obra()
    {
        return $this->belongsTo('App\Obra');
    }

    public function estadoPago()
    {
        return $this->belongsTo('App\ControlPago');
    }
}
