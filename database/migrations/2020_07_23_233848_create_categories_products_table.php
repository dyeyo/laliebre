<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesProductsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('categories_products', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->string('description');
      $table->bigInteger('hallway_id')->unsigned();

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
    Schema::dropIfExists('categories_products');
  }
}
