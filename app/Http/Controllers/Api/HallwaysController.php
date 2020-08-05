<?php

namespace App\Http\Controllers\Api;

use App\CategoriesProducts;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Hallways;
use App\Products_recipes;
use Illuminate\Support\Arr;
class HallwaysController extends Controller
{
  public function index()
  {
    return  Hallways::with('categorias.productos')->get();
  }


  public function store(Request $request)
  {
    if (!auth('api')->check()) {
      return response()->json(['error' => 'Unauthorized'], 401);
    } else {
      Hallways::create($request->all());
      return response()->json(['status' => 'Pasillo creado con exito'], 200);
    }
  }


  public function update(Request $request, $id)
  {
    if (!auth('api')->check()) {
      return response()->json(['error' => 'Unauthorized'], 401);
    } else {
      $hallways = Hallways::find($id);
      $hallways->name = $request->name;
      $hallways->save();
      return response()->json(['status' => 'Pasillo actualizado con exito'], 200);
    }
  }

  public function destroy($id)
  {
    if (!auth('api')->check()) {
      return response()->json(['error' => 'Unauthorized'], 401);
    } else {
      Hallways::find($id)->delete();
      return response()->json(['status' => 'Pasillo  eliminado con exito'], 200);
    }
  }

  public function pasillosCategoria($id)
  {
    return response()->json(['categoriasPasillos' => CategoriesProducts::where('hallway_id', $id)->get()]);
  }

  public function getPasillo($id)
  {
    $dataPasillo = Hallways::with('categorias.productos')->find($id);
    $countProductos = Products_recipes::where('hallway_id',$id)->count();
    $data = Arr::add($dataPasillo,'totalProdutos',$countProductos);
    return response()->json(['data'=>$data], 200);
  }
}
