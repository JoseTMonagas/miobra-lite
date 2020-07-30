<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banco extends Model
{
    use SoftDeletes;

    protected $appends = ['editRoute', 'deleteRoute'];
    protected $fillable = ['nombre'];

    public function getEditRouteAttribute()
    {
        return route('bancos.edit', $this->id);
    }

    public function getDeleteRouteAttribute()
    {
        return route('bancos.destroy', $this->id);
    }
}
