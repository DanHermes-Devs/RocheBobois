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
            $table->float('precio_descuento')->nullable();
            $table->integer('mostrar_en_sales')->nullable();
            $table->text('imagen_destacada')->nullable();
            $table->text('galeria')->nullable();
            $table->text('slug')->nullable();

            // Relacion con la tabla subcategories
            $table->unsignedBigInteger('subcategory_id')->nullable();
            $table->foreign('subcategory_id')->references('id')->on('subcategories')->onDelete('cascade');
            
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
