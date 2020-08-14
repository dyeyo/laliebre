<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DistritosStore extends Model
{
  public function store()
  {
    return $this->belongsToMany(CategoriesStore::class, 'store_id');
  }

  public function distritos()
  {
    return $this->belongsToMany(Districts::class, 'district_id');
  }
}
