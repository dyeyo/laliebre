<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class agregarEliminarIngrediente extends Model
{
    protected $guarded = [];
    public function shopingCartRecipeIngredients()
      {
        return $this->belongsTo(ShoppingCart::class, 'recipes_id');
      }
}