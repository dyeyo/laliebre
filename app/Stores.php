<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stores extends Model
{
  protected $guarded = [];

  public function typeStore()
  {
    return $this->belongsTo(CategoriesStore::class, 'store_id');
  }

  public function distritos()
  {
    return $this->belongsTo(Districts::class, 'district_id');
  }

  public function user()
  {
    return $this->belongsTo(User::class, 'user_id');
  }

  public function productos()
  {
    return $this->hasMany(Products::class, 'store_id');
  }

  public function receta()
  {
    return $this->hasMany(Recipes::class);
  }
}
