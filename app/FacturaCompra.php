<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FacturaCompra extends Model
{
    use SoftDeletes;

    protected $appends = ['editRoute', 'deleteRoute'];

    public function getEditRouteAttribute()
    {
        return route('facturas.edit', $this->id);
    }

    public function getDeleteRouteAttribute()
    {
        return route('facturas.destroy', $this->id);
    }

    public function facturable()
    {
        return $this->morphTo();
    }
}
