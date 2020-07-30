<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes;

    protected $fillable = ["razon_social", "rut", "comuna"];
    protected $appends = ["editRoute", "deleteRoute"];

    public function getEditRouteAttribute()
    {
        return route('clientes.edit', $this->id);
    }

    public function getDeleteRouteAttribute()
    {
        return route('clientes.destroy', $this->id);
    }

    public function obras()
    {
        return $this->hasMany('App\Obra');
    }
}
