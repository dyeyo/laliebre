<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgregarEliminarIngredientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agregar_eliminar_ingredientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_ingrediente')->nullable()->default('null');
            $table->integer('agregar_cantidad')->nullable()->default(0);
            $table->integer('restar_cantidad')->nullable()->default(0);
            $table->integer('eliminar_cantidad')->nullable()->default(null);
            $table->bigInteger('recipes_id')->unsigned()->nullable();
            $table->foreign('recipes_id')->references('id')->on('recipes');
            $table->bigInteger('products_recipes_id')->unsigned()->nullable();
            $table->foreign('products_recipes_id')->references('id')->on('products_recipes');
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
        Schema::dropIfExists('agregar_eliminar_ingredientes');
    }
}
