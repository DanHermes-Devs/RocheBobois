<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShowroomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('showrooms', function (Blueprint $table) {
            $table->id();
            $table->text('nombre_showroom')->nullable();
            $table->text('ciudad_showroom')->nullable();
            $table->text('numero_whatsapp')->nullable();
            $table->text('mensaje_predeterminado_wp')->nullable();
            $table->text('numero_llamadas')->nullable();
            $table->text('iframe_google_maps')->nullable();
            $table->text('direccion_showroom')->nullable();
            $table->text('como_llegar')->nullable();
            $table->text('id_tag_manager')->nullable();
            $table->text('imagen_destacada')->nullable();
            // Campo slug
            $table->text('slug')->nullable();
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
        Schema::dropIfExists('showrooms');
    }
}
