<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsRecipeRecipesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('products_recipe_recipes', function (Blueprint $table) {
      $table->id();
      $table->string('quantity');

      $table->bigInteger('products_recipe_id')->unsigned()->nullable();
      $table->bigInteger('recipes_id')->unsigned()->nullable();

      $table->foreign('products_recipe_id')->references('id')->on('products_recipes');
      $table->foreign('recipes_id')->references('id')->on('recipes');

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
    Schema::dropIfExists('products_recipe_recipes');
  }
}
