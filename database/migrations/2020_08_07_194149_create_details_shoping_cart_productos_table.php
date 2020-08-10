<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsShopingCartProductosTable extends Migration
{

  public function up()
  {
    Schema::create('details_shoping_cart_productos', function (Blueprint $table) {
      $table->id();
      $table->double('price_unity');
      $table->integer('cuantity');

      $table->bigInteger('products_id')->unsigned()->nullable();

      $table->foreign('products_id')->references('id')->on('shopping_card_products');

      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('details_shoping_cart_productos');
  }
}
