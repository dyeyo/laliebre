<?php

namespace App\Http\Controllers;

use App\CategoriesProducts;
use App\Hallways;
use App\Products;
use App\Products_recipes;
use App\Providers;
use App\Stores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
{
  public function index()
  {
    $products = Products_recipes::all();
    $categories = CategoriesProducts::all();
    $stores = Stores::all();
    $proveedor = Providers::all();
    $hallways = Hallways::all();
    return view('products.index', compact('products', 'hallways', 'categories', 'stores', 'proveedor'));
  }


  public function store(Request $request)
  {
    $product = new Products_recipes($request->all());
    if ($request->hasFile('image')) {
      $file = $request->file('image');
      $name1 = $file->getClientOriginalName();
      $file->move(public_path() . '/img/products/', $name1);
      $product->image = $name1;
    }
    $product->save();
    Session::flash('message', 'Producto creado con exito');
    return redirect()->route('products');
  }

  public function edit(Request $request, $id)
  {
    $product = Products_recipes::with('categories', 'stores', 'hallways', 'proveedores')->find($id);
    $categories = CategoriesProducts::all();
    $hallways = Hallways::all();
    $stores = Stores::all();
    $proveedor = Providers::all();

    return view('products.edit', compact('product', 'categories', 'stores', 'hallways', 'proveedor'));
  }

  public function update(Request $request, $id)
  {
    $product = Products_recipes::find($id);
    $product->update($request->all());
    if ($request->hasFile('image')) {
      $file = $request->file('image');
      $name1 = $file->getClientOriginalName();
      $file->move(public_path() . '/img/products/', $name1);
      $product->image = $name1;
    }
    $product->update();
    Session::flash('message', 'Producto editado con exito');
    return redirect()->route('products');
  }

  public function destroy($id)
  {
    Products_recipes::find($id)->delete();
    Session::flash('message', 'Producto eliminado con exito');
    return redirect()->route('products');
  }

  /*
  /* Petición - AJAX
  */
  public function indexByRecipe(Request $request)
  {
    if ($request->ajax())
      return response(Products_recipes::all());
  }
}
