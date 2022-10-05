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
            // Relacionar con la tabla categories
            $table->integer('category_id')->nullable();
            // Relacion con la tabla subcategories
            $table->integer('subcategory_id')->nullable();
            $table->text('nombre_producto')->nullable();
            $table->text('descripcion')->nullable();
            $table->text('precio')->nullable();
            $table->text('precio_descuento')->nullable();
            $table->integer('mostrar_en_sales')->nullable();
            $table->integer('best_seller')->nullable();
            $table->integer('oportunidad_unica')->nullable();
            $table->integer('home_office')->nullable();
            $table->integer('coleccion_pertenece')->nullable();
            $table->text('imagen_destacada')->nullable();
            $table->text('galeria')->nullable();
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
