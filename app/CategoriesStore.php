<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriesStore extends Model
{
  protected $guarded = [];

  public function store()
  {
    return $this->hasMany(Stores::class, 'store_id');
  }

  public function stores()
  {
    return $this->belongsToMany(DistritosStore::class);
  }
}
