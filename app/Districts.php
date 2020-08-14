<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Districts extends Model
{
  protected $guarded = [];

  public function stores()
  {
    return $this->hasMany(DistritosStore::class);
  }
}
