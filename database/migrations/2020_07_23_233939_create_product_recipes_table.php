<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_recipes', function (Blueprint $table) {
            $table->id();
            $table->string('quantity');
            $table->string('um');

            $table->bigInteger('product_id')->unsigned()->nullable();
            $table->bigInteger('recipe_id')->unsigned()->nullable();

            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('recipe_id')->references('id')->on('recipes');

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
        Schema::dropIfExists('product_recipes');
    }
}
