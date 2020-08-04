<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenCompraProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden_compra_producto', function (Blueprint $table) {
            $table->id();
            $table->foreignId('orden_compra_id');
            $table->foreignId('producto_id');
            $table->foreignId('cuenta_id');
            $table->string('cantidad');
            $table->string('precio');
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
        Schema::dropIfExists('orden_compra_producto');
    }
}
