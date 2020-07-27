<?php

namespace App\Http\Controllers;

use App\CategoriesProducts;
use App\Hallways;
use App\Products;
use App\Stores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
{
  public function index()
  {
    $products = Products::all();
    $categories = CategoriesProducts::all();
    $stores = Stores::all();
    $hallways = Hallways::all();
    return view('products.index', compact('products', 'hallways', 'categories', 'stores'));
  }


  public function store(Request $request)
  {
    $product = new Products($request->all());
    $product->update($request->all());
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
    $product = Products::with('categories', 'stores', 'hallways')->find($id);
    $categories = CategoriesProducts::all();
    $hallways = Hallways::all();
    $stores = Stores::all();
    return view('products.edit', compact('product', 'categories', 'stores', 'hallways'));
  }

  public function update(Request $request, $id)
  {
    $product = Products::find($id);
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
    Products::find($id)->delete();
    Session::flash('message', 'Producto eliminado con exito');
    return redirect()->route('products');
  }

  /*
  /* Petición - AJAX
  */
  public function indexByRecipe(Request $request)
  {
    if ( $request->ajax() )
      return response( Products::all() );
  }

  public function showByRecipe(Request $request, $id)
  {
    if ( $request->ajax() )
      return response( App\ProductRecipes::where('recipe_id', $id)->get() );
  }


}
