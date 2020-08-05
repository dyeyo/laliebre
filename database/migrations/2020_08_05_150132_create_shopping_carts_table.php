<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoppingCartsTable extends Migration
{
  public function up()
  {
    Schema::create('shopping_carts', function (Blueprint $table) {
      $table->id();

      $table->integer('state')->nullable();
      $table->bigInteger('recipes_id')->unsigned()->nullable();

      $table->foreign('recipes_id')->references('id')->on('recipes');

      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('shopping_carts');
  }
}
