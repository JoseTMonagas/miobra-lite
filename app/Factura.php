<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Factura extends Model
{
    use SoftDeletes;

    protected $fillable = ["tipo_pago", "fecha_documento", "monto", "folio_documento", "banco_id"];
    protected $appends = ["editRoute", "deleteRoute"];

    public function getEditRouteAttribute()
    {
        return route('cobranzas.edit', $this->id);
    }

    public function getDeleteRouteAttribute()
    {
        return route('cobranzas.destroy', $this->id);
    }

    public function getBancoAttribute()
    {
        return $this->banco()->first();
    }

    public function banco()
    {
        return $this->belongsTo('App\Banco');
    }
}
