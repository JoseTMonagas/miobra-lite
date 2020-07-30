<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use SoftDeletes;

    protected $appends = ['editRoute', 'deleteRoute'];
    protected $fillable = ['nombre', 'codigo'];

    public function getEditRouteAttribute()
    {
        return route('productos.edit', $this->id);
    }

    public function getDeleteRouteAttribute()
    {
        return route('productos.destroy', $this->id);
    }
}
