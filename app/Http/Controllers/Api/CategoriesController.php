<?php

namespace App\Http\Controllers\Api;

use App\CategoriesProducts;
use App\Http\Controllers\Controller;
use App\Products_recipes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    // if (!auth('api')->check()) {
    //   return response()->json(['error' => 'Unauthorized'], 401);
    // } else {
    return  $categories = CategoriesProducts::all();
    //}
  }


  public function store(Request $request)
  {
    if (!auth('api')->check()) {
      return response()->json(['error' => 'Unauthorized'], 401);
    } else {
      $category = new CategoriesProducts($request->all());
      $category->save();
      return response()->json(['status' => 'Categoria creada con exito'], 200);
    }
  }

  public function categoriaProductos($id)
  {
    return response()->json(['categorias' => Products_recipes::where('categorie_id', $id)->get()]);
  }

  public function update(Request $request, $id)
  {

    if (!auth('api')->check()) {
      return response()->json(['error' => 'Unauthorized'], 401);
    } else {
      $category = CategoriesProducts::find($id);
      $category->update($request->all());
    }
    return response()->json(['status' => 'Categoria actualizada con exito'], 200);
  }

  public function destroy($id)
  {
    if (!auth('api')->check()) {
      return response()->json(['error' => 'Unauthorized'], 401);
    } else {
      CategoriesProducts::find($id)->delete();
      return response()->json(['status' => 'Categoria eliminada con exito'], 200);
    }
  }
}
