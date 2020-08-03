<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Recipes;

class RecipesController extends Controller
{
  public function index()
  {
    return response()->json(['success' => Recipes::with('store', 'productos', 'productos.sotre')->get()]);
  }

  public function show($id)
  {
    return response()->json(['success' => Recipes::with('productos', 'productos.sotre', 'store')->find($id)]);
  }

  public function getType($type)
  {
    return response()->json(['success' => Recipes::with('productos', 'productos.sotre', 'store')
      ->where('type', $type)->get()]);
  }
}
