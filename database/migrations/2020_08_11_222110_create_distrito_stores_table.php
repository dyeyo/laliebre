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
    Schema::create('categories_store_distritos_store', function (Blueprint $table) {
      $table->id();
      $table->bigInteger('categories_store_id')->unsigned();
      $table->bigInteger('distritos_store_id')->unsigned();

      $table->foreign('categories_store_id')->references('id')->on('categories_stores');
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
    Schema::dropIfExists('categories_store_distritos_store');
  }
}
