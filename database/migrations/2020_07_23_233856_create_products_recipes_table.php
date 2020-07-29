<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsRecipesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('products_recipes', function (Blueprint $table) {
      $table->id();
      $table->string('code');
      $table->string('name');
      $table->string('description');
      $table->string('image');
      $table->integer('price');
      $table->string('quantity');
      $table->string('um');

      $table->bigInteger('store_id')->unsigned();
      $table->bigInteger('categorie_id')->unsigned();
      $table->bigInteger('hallway_id')->unsigned();

      $table->foreign('store_id')->references('id')->on('stores');
      $table->foreign('categorie_id')->references('id')->on('categories_products');
      $table->foreign('hallway_id')->references('id')->on('hallways');

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
    Schema::dropIfExists('products_recipes');
  }
}
