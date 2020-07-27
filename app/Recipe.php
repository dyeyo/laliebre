<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
	// protected $fillable = ['name', 'store', 'code','description','lick','image','quantity'];

    protected $guarded = [];

    public function products()
    {
        return $this->belongsToMany(Products::class, 'product_recipes', 'product_id', 'id');
    }

    public function store()
    {
        return $this->belongsTo(Stores::class,'store_id','id');
    }
}
