<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EstadoObra extends Model
{
    use SoftDeletes;

    protected $appends = ['editRoute', 'deleteRoute'];
    protected $fillable = ['nombre'];

    public function getEditRouteAttribute()
    {
        return route('estados-obra.edit', $this->id);
    }

    public function getDeleteRouteAttribute()
    {
        return route('estados-obra.destroy', $this->id);
    }

    public function obras()
    {
        return $this->hasMany('App\Obra');
    }

}
