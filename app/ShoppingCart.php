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

  public function user()
  {
    return $this->belongsTo(User::class, 'user_id');
  }

  public function a_e_integientes()
  {
    return $this->hasMany(agregarEliminarIngrediente::class, 'recipes_id');
  }
}
