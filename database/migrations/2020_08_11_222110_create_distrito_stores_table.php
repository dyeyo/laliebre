<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistritoStoresTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('distritos_store_stores', function (Blueprint $table) {
      $table->id();
      $table->bigInteger('stores_id')->unsigned();
      $table->bigInteger('distritos_store_id')->unsigned();

      $table->foreign('stores_id')->references('id')->on('stores');
      $table->foreign('distritos_store_id')->references('id')->on('districts');
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
    Schema::dropIfExists('distritos_store_stores');
  }
}
