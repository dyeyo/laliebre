<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
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

  public function recipes()
  {
        return $this->belongsToMany(Recipe::class, 'product_recipes', 'recipe_id', 'id');
  }
}
