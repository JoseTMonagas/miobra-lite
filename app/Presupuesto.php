<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Presupuesto extends Model
{
    use SoftDeletes;

    protected $appends = ['editRoute', 'deleteRoute'];

    public function getEditRouteAttribute()
    {
        return route('presupuestos.edit', $this->id);
    }

    public function getDeleteRouteAttribute()
    {
        return route('presupuestos.destroy', $this->id);
    }

    public function obra()
    {
        return $this->belongsTo('App\Obra');
    }

    public function cuentas()
    {
        return $this->belongsToMany('App\Cuenta')->withPivot(['costo', 'neto']);
    }
}
