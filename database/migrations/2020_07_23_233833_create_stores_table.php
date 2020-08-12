<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('stores', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->string('description');
      $table->string('logo');
      $table->integer('state')->default(1);

      $table->bigInteger('store_id')->unsigned();
      $table->bigInteger('user_id')->unsigned();

      $table->foreign('store_id')->references('id')->on('categories_stores')->onDelete('cascade');
      $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
    Schema::dropIfExists('stores');
  }
}
