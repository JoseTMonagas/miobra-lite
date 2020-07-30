<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cuenta extends Model
{
    use SoftDeletes;

    protected $fillable = ['nombre', 'tipo_cuenta_id'];
    protected $appends = ['editRoute', 'deleteRoute'];

    public function getEditRouteAttribute()
    {
        return route('cuentas.edit', $this->id);
    }

    public function getDeleteRouteAttribute()
    {
        return route('cuentas.destroy', $this->id);
    }

    public function presupuestos()
    {
        return $this->belongsToMany('App\Presupuesto')->withPivot(['costo', 'neto']);
    }

    public function tipoCuenta()
    {
        return $this->belongsTo('App\TipoCuenta');
    }
}
