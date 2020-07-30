<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ControlPago extends Model
{
    use SoftDeletes;

    protected $appends = ['editRoute', 'deleteRoute'];
    protected $fillable = ['nombre'];

    public function getEditRouteAttribute()
    {
        return route('controles-pago.edit', $this->id);
    }

    public function getDeleteRouteAttribute()
    {
        return route('controles-pago.destroy', $this->id);
    }

    public function estadosPago()
    {
        return $this->hasMany('App\EstadoPago');
    }
}
