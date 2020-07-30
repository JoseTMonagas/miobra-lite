<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuentaPresupuestoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuenta_presupuesto', function (Blueprint $table) {
            $table->id();

            $table->foreignId('presupuesto_id')->constrained();
            $table->unsignedBigInteger('costo');
            $table->unsignedBigInteger('neto');

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
        Schema::dropIfExists('cuenta_presupuesto');
    }
}
