<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('recipes', function (Blueprint $table) {
      $table->id();

      $table->string('name');
      $table->string('code');
      $table->string('description');
      $table->string('link');
      $table->string('image');
      $table->integer('servings')->default(1);
      $table->bigInteger('storeId')->unsigned();

      $table->foreign('storeId')->references('id')->on('stores');


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
    Schema::dropIfExists('recipes');
  }
}
