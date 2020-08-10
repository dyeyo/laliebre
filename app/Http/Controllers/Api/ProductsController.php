<?php

namespace App\Http\Controllers\Api;

use App\CategoriesProducts;
use App\Hallways;
use App\Products;
use App\Stores;
use App\Http\Controllers\Controller;
use App\Products_recipes;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
  public function index()
  {
    $products = Products_recipes::all();

    return response()->json([
      'status' => 'success',
      'productos' => $products,
    ], 200);
  }

  public function productStore($id)
  {
    $products = Products_recipes::where('store_id', $id)->get();
    return response()->json([
      'status' => 'success',
      'productos' => $products,
    ], 200);
  }

  public function store(Request $request)
  {
    if (!auth('api')->check()) {
      return response()->json(['error' => 'Unauthorized'], 401);
    } else {
      $product = new Products_recipes($request->all());
      $product->save($request->all());
      if ($request->hasFile('image')) {
        $file = $request->file('image');
        $name1 = $file->getClientOriginalName();
        $file->move(public_path() . '/img/products/', $name1);
        $product->image = $name1;
      }
      $product->save();
      return response()->json(['status' => 'producto creado con exito'], 200);
    }
  }

  public function show($id)
  {
    return response()->json(Products_recipes::find($id));
  }

  public function update(Request $request, $id)
  {
    if (!auth('api')->check()) {
      return response()->json(['error' => 'Unauthorized'], 401);
    } else {
      $product = Products_recipes::find($id);
      $product->update($request->all());
      if ($request->hasFile('image')) {
        $file = $request->file('image');
        $name1 = $file->getClientOriginalName();
        $file->move(public_path() . '/img/products/', $name1);
        $product->image = $name1;
      }
      $product->update();
      return response()->json(['status' => 'producto actualizado con exito'], 200);
    }
  }

  public function destroy($id)
  {
    if (!auth('api')->check()) {
      return response()->json(['error' => 'Unauthorized'], 401);
    } else {
      Products_recipes::find($id)->delete();
      return response()->json(['status' => 'producto eliminado con exito'], 200);
    }
  }
}
