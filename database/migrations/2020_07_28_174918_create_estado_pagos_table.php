<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstadoPagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estado_pagos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('obra_id')->constrained();

            $table->unsignedInteger('porcentaje');
            $table->string('descripcion');
            $table->unsignedBigInteger('monto');
            $table->date('fecha_emision');
            $table->date('fecha_pago');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estado_pagos');
    }
}
