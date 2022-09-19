<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collections', function (Blueprint $table) {
            $table->id();
            $table->text('nombre_disenador')->nullable();
            $table->text('descripcion')->nullable();
            $table->text('imagen_destacada')->nullable();
            $table->text('nombre_coleccion')->nullable();
            $table->text('foto_disenador')->nullable();
            $table->text('img_galeria')->nullable();
            // Slug
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
        Schema::dropIfExists('collections');
    }
}
