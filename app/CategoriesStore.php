<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriesStore extends Model
{
  protected $guarded = [];

  public function store()
  {
    return $this->hasMany(Stores::class);
  }
}
