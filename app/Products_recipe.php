<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products_recipe extends Model
{
  protected $guarded = [];

  public function sotre()
  {
    return $this->belongsTo(Stores::class, 'store_id');
  }
}
