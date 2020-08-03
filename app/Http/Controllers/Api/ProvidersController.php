<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Providers;
use Illuminate\Http\Request;

class ProvidersController extends Controller
{
  public function index()
  {
    return response()->json(['proveedores', Providers::all()]);
  }


  public function store(Request $request)
  {
    if (!auth('api')->check()) {
      return response()->json(['error' => 'Unauthorized'], 401);
    } else {
      Providers::create($request->all());
      return response()->json(['status' => 'Proveedor creado con exito'], 200);
    }
  }

  public function update(Request $request, $id)
  {
    if (!auth('api')->check()) {
      return response()->json(['error' => 'Unauthorized'], 401);
    } else {
      $providers = Providers::find($id);
      $providers->name = $request->name;
      $providers->save();
      return response()->json(['status' => 'Proveedor editado con exito'], 200);
    }
  }

  public function destroy($id)
  {
    if (!auth('api')->check()) {
      return response()->json(['error' => 'Unauthorized'], 401);
    } else {
      Providers::find($id)->delete();
      return response()->json(['status' => 'Proveedor  eliminado con exito'], 200);
    }
  }
}
