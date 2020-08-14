<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannerAliadosTable extends Migration
{
  public function up()
  {
    Schema::create('banner_aliados', function (Blueprint $table) {
      $table->id();
      $table->string('image');
      $table->bigInteger('store_id')->unsigned()->nullable();
      $table->foreign('store_id')->references('id')->on('stores');
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
    Schema::dropIfExists('banner_aliados');
  }
}
