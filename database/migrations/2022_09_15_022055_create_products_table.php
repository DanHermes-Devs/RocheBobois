<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->text('nombre_producto')->nullable();
            $table->text('descripcion')->nullable();
            $table->text('descripcion_corta')->nullable();
            $table->float('precio')->nullable();
            $table->integer('mostrar_en_sales')->nullable();
            $table->unsignedBigInteger('coleccion_pertenece')->nullable();
            $table->text('imagen_destacada')->nullable();
            $table->text('imagen_1')->nullable();
            $table->text('imagen_2')->nullable();
            $table->text('imagen_3')->nullable();
            $table->text('imagen_4')->nullable();
            $table->text('imagen_5')->nullable();
            $table->text('imagen_6')->nullable();
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
        Schema::dropIfExists('products');
    }
}
