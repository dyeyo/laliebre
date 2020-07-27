<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Districts;

class DistrictsController extends Controller
{
  public function index()
  {
    // if (!auth('api')->check()) {
    //   return response()->json(['error' => 'Unauthorized'], 401);
    // } else {
    return $districts = Districts::all();
    //}
  }


  public function store(Request $request)
  {
    if (!auth('api')->check()) {
      return response()->json(['error' => 'Unauthorized'], 401);
    } else {
      Districts::create($request->all());

      return response()->json(['status' => 'Distrito creado con exito'], 200);
    }
  }



  public function update(Request $request, $id)
  {
    if (!auth('api')->check()) {
      return response()->json(['error' => 'Unauthorized'], 401);
    } else {
      $district = Districts::find($id);
      $district->name = $request->name;
      $district->save();
      return response()->json(['status' => 'Distrito actualizado con exito'], 200);
    }
  }

  public function destroy($id)
  {
    if (!auth('api')->check()) {
      return response()->json(['error' => 'Unauthorized'], 401);
    } else {
      Districts::find($id)->delete();

      return response()->json(['status' => 'Distrito eliminado con exito'], 200);
    }
  }
}
