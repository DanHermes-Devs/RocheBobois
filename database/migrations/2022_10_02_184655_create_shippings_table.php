<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shippings', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_completo');
            $table->string('email');
            $table->string('telefono');
            $table->string('direccion_principal');
            $table->string('direccion_opcional')->nullable();
            $table->string('pais');
            $table->string('estado');
            $table->string('codigo_postal');
            $table->string('informacion_adicional')->nullable();
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
        Schema::dropIfExists('shippings');
    }
}
