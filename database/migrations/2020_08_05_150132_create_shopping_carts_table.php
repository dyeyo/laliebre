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

      $table->integer('state')->nullable()->default(1);
      $table->integer('quantity')->default(1);
      $table->double('total');
      $table->string('address', 200)->nullable();
      $table->string('delivery_date', 200)->nullable();
      $table->string('delivery_hours', 200)->nullable();

      $table->bigInteger('recipes_id')->unsigned()->nullable();
      $table->bigInteger('user_id')->unsigned()->nullable();

      $table->foreign('recipes_id')->references('id')->on('recipes');
      $table->foreign('user_id')->references('id')->on('users');

      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('shopping_carts');
  }
}
