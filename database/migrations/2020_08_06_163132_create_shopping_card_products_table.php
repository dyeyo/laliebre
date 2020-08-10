<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoppingCardProductsTable extends Migration
{

  public function up()
  {
    Schema::create('shopping_card_products', function (Blueprint $table) {
      $table->id();

      $table->integer('state')->nullable()->default(1);
      $table->integer('quantity')->default(1);
      $table->double('total');

      $table->bigInteger('product_id')->unsigned()->nullable();
      $table->bigInteger('user_id')->unsigned()->nullable();
      $table->bigInteger('store_id')->unsigned()->nullable();

      $table->foreign('product_id')->references('id')->on('products_recipes');
      $table->foreign('user_id')->references('id')->on('users');
      $table->foreign('store_id')->references('id')->on('stores');

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
    Schema::dropIfExists('shopping_card_products');
  }
}
