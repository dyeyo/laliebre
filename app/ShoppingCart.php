<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
  protected $guarded = [];

  public function recetas()
  {
    return $this->belongsTo(Recipes::class, 'recipes_id');
  }
}
