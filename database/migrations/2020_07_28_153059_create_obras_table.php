<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obras', function (Blueprint $table) {
            $table->id();

            $table->foreignId('cliente_id')->constrained();
            $table->foreignId('estado_obra_id')->constrained();

            $table->string('nombre');
            $table->string('descripcion');
            $table->date('fecha_inicio');,
            'estado_obra_id'           $table->date('fecha_termino');
            $table->unsignedInteger('plazo');
            $table->string('trato_tipo');
            $table->string('trato_ref');
            $table->string('trato_nombre');
            $table->string('contacto_nombre');
            $table->string('contacto_telefono')->nullable();
            $table->string('contacto_correo')->nullable();
            $table->string('responsable_nombre');
            $table->string('responsable_telefono')->nullable();
            $table->string('responsable_correo')->nullable();
            $table->string('supervisor_nombre');
            $table->string('supervisor_telefono')->nullable();
            $table->string('supervisor_correo')->nullable();
            $table->string('comuna');
            $table->string('ciudad');
            $table->string('ubicacion')->nullable();
            $table->string('latitud')->nullable();
            $table->string('longitud')->nullable();

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
        Schema::dropIfExists('obras');
    }
}
