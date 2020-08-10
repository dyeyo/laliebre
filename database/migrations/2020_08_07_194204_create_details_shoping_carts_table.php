<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsShopingCartsTable extends Migration
{

  public function up()
  {
    Schema::create('details_shoping_carts', function (Blueprint $table) {
      $table->id();

      $table->double('price_unity');
      $table->integer('cuantity');

      $table->bigInteger('recipes_id')->unsigned()->nullable();

      $table->foreign('recipes_id')->references('id')->on('shopping_carts');

      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('details_shoping_carts');
  }
}
