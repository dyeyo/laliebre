<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipes extends Model
{
  protected $guarded = [];

  public function store()
  {
    return $this->belongsTo(Stores::class, 'storeId');
  }

  public function productos()
  {
    return $this->belongsToMany(Products_recipe::class);
  }

  public function shoppingCart()
  {
    return $this->hasMany(ShoppingCart::class);
  }
}
