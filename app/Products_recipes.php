<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products_recipes extends Model
{
  protected $guarded = [];

  public function categories()
  {
    return $this->belongsTo(CategoriesProducts::class, 'categorie_id');
  }

  public function stores()
  {
    return $this->belongsTo(Stores::class, 'store_id');
  }
 
  public function hallways()
  {
    return $this->belongsTo(Hallways::class, 'hallway_id');
  }

  public function proveedores()
  {
    return $this->belongsTo(Providers::class, 'provider_id');
  }

  public function receta()
  {
    return $this->belongsToMany(Products_recipe::class);
  }
}
