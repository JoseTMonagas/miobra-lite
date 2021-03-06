<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoCuenta extends Model
{
    use SoftDeletes;

    protected $appends = ['editRoute', 'deleteRoute'];
    protected $fillable = ['nombre'];

    public function getEditRouteAttribute()
    {
        return route('tipos-cuenta.edit', $this->id);
    }

    public function getDeleteRouteAttribute()
    {
        return route('tipos-cuenta.destroy', $this->id);
    }

    public function cuentas()
    {
        return $this->hasMany('App\Cuenta');
    }
}
