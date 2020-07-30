<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedioPago extends Model
{
    use SoftDeletes;

    protected $appends = ['editRoute', 'deleteRoute'];
    protected $fillable = ['nombre'];

    public function getEditRouteAttribute()
    {
        return route('medios-pago.edit', $this->id);
    }

    public function getDeleteRouteAttribute()
    {
        return route('medios-pago.destroy', $this->id);
    }
}
