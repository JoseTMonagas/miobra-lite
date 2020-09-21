<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proveedor extends Model
{
    use SoftDeletes;

    protected $fillable = ['razon_social', 'giro', 'rut', 'comuna', 'direccion', 'telefono', 'correo'];

    protected $appends = ['editRoute', 'deleteRoute'];

    public function getEditRouteAttribute()
    {
        return route('proveedores.edit', $this->id);
    }

    public function getDeleteRouteAttribute()
    {
        return route('proveedores.destroy', $this->id);
    }

}
