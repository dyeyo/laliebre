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
    return $this->belongsToMany(Products_recipe::class)->select(array('name', 'description', 'image', 'price', 'um', 'umGeneral', 'quantity_producto', 'recipes_id', 'products_recipe_id'));
  }

  public function shoppingCart()
  {
    return $this->hasMany(ShoppingCart::class);
  }
}
