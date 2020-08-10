<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCardProducts extends Model
{
  protected $guarded = [];

  public function productos()
  {
    return $this->belongsTo(Products_recipes::class, 'product_id');
  }

  public function stores()
  {
    return $this->belongsTo(Stores::class, 'store_id');
  }

  public function user()
  {
    return $this->belongsTo(User::class, 'user_id');
  }
}
