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
      $table->double('price');
      $table->string('um');
      $table->string('umGeneral');
      $table->bigInteger('quantity');

      $table->bigInteger('store_id')->unsigned()->nullable();;
      $table->bigInteger('categorie_id')->unsigned()->nullable();;
      $table->bigInteger('provider_id')->unsigned()->nullable();
      $table->bigInteger('hallway_id')->unsigned()->nullable();;

      $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
      $table->foreign('categorie_id')->references('id')->on('categories_products');
      $table->foreign('provider_id')->references('id')->on('providers')->onDelete('cascade');
      $table->foreign('hallway_id')->references('id')->on('hallways')->onDelete('cascade');

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
