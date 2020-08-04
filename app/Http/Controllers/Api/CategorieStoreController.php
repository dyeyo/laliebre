<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CategoriesStore;
use App\Stores;

class CategorieStoreController extends Controller
{
  public function index()
  {
    return $typeStores = CategoriesStore::all();
  }

  public function asociatisStores($id)
  {
    $typeStores = CategoriesStore::with('store')->find($id);
    return response()->json(['tiendas' => $typeStores], 200);
  }

  public function store(Request $request)
  {
    if (!auth('api')->check()) {
      return response()->json(['error' => 'Unauthorized'], 401);
    } else {
      $typeStores = new CategoriesStore;
      $typeStores->name = $request->name;
      if ($request->hasFile('image')) {
        $file = $request->file('image');
        $name1 = $file->getClientOriginalName();
        $file->move(public_path() . '/img/typeStore/', $name1);
        $typeStores->image = $name1;
      }
      $typeStores->save();
      return response()->json(['status' => 'Categoria store creada con exito'], 200);
    }
  }

  public function update(Request $request, $id)
  {
    if (!auth('api')->check()) {
      return response()->json(['error' => 'Unauthorized'], 401);
    } else {
      $typeStores = CategoriesStore::find($id);
      $typeStores->name = $request->name;
      if ($request->hasFile('logo')) {
        $file = $request->file('logo');
        $name1 = $file->getClientOriginalName();
        $file->move(public_path() . '/images/typeSotre/', $name1);
        $typeStores->image = $name1;
      }
      $typeStores->save();
      return response()->json(['status' => 'Categoria store actualizada con exito'], 200);
    }
  }

  public function destroy($id)
  {
    if (!auth('api')->check()) {
      return response()->json(['error' => 'Unauthorized'], 401);
    } else {
      CategoriesStore::find($id)->delete();
      return response()->json(['status' => 'Categoria store eliminada con exito'], 200);
    }
  }
}
