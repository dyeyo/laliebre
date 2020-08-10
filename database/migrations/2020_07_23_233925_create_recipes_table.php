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

      $table->string('name')->nullable();
      $table->string('code')->nullable();
      $table->string('description')->nullable();
      $table->string('link')->nullable();
      $table->string('type')->nullable();
      $table->string('image')->nullable();
      $table->integer('servings')->default(1);
      $table->double('price');
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
