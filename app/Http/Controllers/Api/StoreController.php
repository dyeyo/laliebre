<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Products_recipes;
use Illuminate\Http\Request;
use App\Stores;

class StoreController extends Controller
{
  public function index()
  {
    // if (!auth('api')->check()) {
    //   return response()->json(['error' => 'Unauthorized'], 401);
    // } else {
    $stores = Stores::all();
    return  $stores;
    //}
  }
  public function store(Request $request)
  {

    if (!auth('api')->check()) {
      return response()->json(['error' => 'Unauthorized'], 401);
    } else {
      $store = new Stores($request->all());
      if ($request->hasFile('logo')) {
        $file = $request->file('logo');
        $name1 = $file->getClientOriginalName();
        $file->move(public_path() . '/img/stores/', $name1);
        $store->logo = $name1;
      }
      $store->save();
      return response()->json([
        'status' => 'Tienda creada con exito',

      ], 200);
    }
  }

  public function update(Request $request, $id)
  {
    if (!auth('api')->check()) {
      return response()->json(['error' => 'Unauthorized'], 401);
    } else {

      $store = Stores::find($id);
      $store->name = $request->name;
      $store->description = $request->description;
      $store->district_id = $request->district_id;
      if ($request->hasFile('logo')) {
        $file = $request->file('logo');
        $name1 = $file->getClientOriginalName();
        $file->move(public_path() . '/img/stores/', $name1);
        $store->logo = $name1;
      }
      $store->update();
      return response()->json([
        'status' => 'Tienda actualizada con exito',

      ], 200);
    }
  }

  public function destroy($id)
  {

    if (!auth('api')->check()) {
      return response()->json(['error' => 'Unauthorized'], 401);
    } else {
      Stores::find($id)->delete();
      return response()->json([
        'status' => 'Tienda Eliminada con exito',
      ], 200);
    }
  }

  public function tiendaProductos($id)
  {
    return response()->json(['productosTienda' => Products_recipes::where('store_id', $id)->get()]);
  }
}