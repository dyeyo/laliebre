<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
  protected $guarded = [];

  public function roles()
  {
    return $this->hasMany(User::class);
  }
}
