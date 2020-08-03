<?php

namespace App; 

use Illuminate\Database\Eloquent\Model;

class CategoriesProducts extends Model
{
  protected $guarded = [];

  public function productos()
  {
    return $this->hasMany(Products_recipes::class, 'categorie_id');
  }

  public function hallways()
  {
    return $this->belongsTo(Hallways::class, 'hallway_id');
  }
}
