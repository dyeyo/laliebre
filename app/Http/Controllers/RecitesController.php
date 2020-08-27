<?php

namespace App\Http\Controllers;

use App\Products_recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Products_recipes;
use App\Recipes;
use App\Stores;
use Illuminate\Support\Facades\DB;

class RecitesController extends Controller
{
  public function index()
  {
    $recipes = Recipes::with('productos')->get();
    $products = Products_recipes::all();
    $stores = Stores::all();
    return view('recites.index', compact('recipes', 'products', 'stores'));
  }

  public function show($id)
  {
    $receta =  Recipes::with('productos', 'store')->find($id);
    return view('recites.show', compact('receta'));
  }

  public function store(Request $request)
  {
    $data = json_decode($request['model']);
    // dd($request->all(), $data->products_recipe_id[0]->id);
    $recipe = new Recipes();
    $recipe->code = $data->code;
    $recipe->name = $data->name;
    $recipe->storeId = $data->storeId;
    // $recipe->description = $data->description;
    $recipe->servings = $data->servings;
    $recipe->price = $data->price;
    // $recipe->link = $data->link;
    $recipe->type = $data->type;
    if ($request->hasFile('image')) {
      $file = $request->file('image');
      $name1 = $file->getClientOriginalName();
      $file->move(public_path() . '/img/recetas/', $name1);
      $recipe->image = $name1;
    }
    $recipe->save();

    foreach ($data->products_recipe_id as $key => $value) {
      $recetaId = Recipes::findOrFail($recipe->id);
      $recetaId->productos()->attach(
        $value->id,
        ['quantity' => $value->quantity]
      );
    }
    $recipe->save();

    Session::flash('message', 'Receta creada con exito');
    return redirect()->route('recetas');
  }

  public function edit(Request $request, $id)
  {
    $receta =  Recipes::with('productos', 'store')->find($id);
    $products = Products_recipes::all();
    //$ingredientes = Recipes::with('productos')->find($id);


    $ingredientes = DB::table('products_recipe_recipes')
      ->select(
        'products_recipe_recipes.id as recetaID',
        'products_recipe_recipes.quantity',
        'products_recipe_recipes.products_recipe_id',
        'products_recipe_recipes.recipes_id',
        'products_recipes.name',
        'products_recipes.image'
      )
      ->join('products_recipes', 'products_recipe_recipes.products_recipe_id', '=', 'products_recipes.id')
      ->where('products_recipe_recipes.recipes_id', $id)
      ->get();
    // dd($ingredientes);
    $stores = Stores::all();
    return view('recites.edit', compact('receta', 'products', 'stores', 'ingredientes'));
  }

  public function update(Request $request, $id)
  {
    $recipe = Recipes::with('productos', 'store')->find($id);
    $recipe->code = $request->code;
    $recipe->name = $request->name;
    $recipe->storeId = $request->storeId;
    $recipe->description = $request->description;
    $recipe->servings = $request->servings;
    $recipe->link = $request->link;
    $recipe->type = $request->type;
    $recipe->price = $request->price;

    if ($request->hasFile('image')) {
      $file = $request->file('image');
      $name1 = $file->getClientOriginalName();
      $file->move(public_path() . '/img/recetas/', $name1);
      $recipe->image = $name1;
    }
    $recipe->save();

    foreach ($request->products_recipe_id as $key => $value) {
      $recetaId = Recipes::findOrFail($recipe->id);
      $recetaId->productos()->attach(
        $value,
        ['quantity' => $request->quantity[$key]]
      );
    }
    $recipe->save();

    Session::flash('message', 'Receta editada con exito');
    return redirect()->route('recetas');
  }

  public function destroy($id)
  {
    Recipes::find($id)->delete();
    Session::flash('message', 'Receta eliminada con exito');
    return redirect()->route('recetas');
  }

  public function destroyIngredients($id)
  {
    DB::table('products_recipe_recipes')->where('id', $id)->delete();
    Session::flash('message', 'Ingrediente eliminado con exito');
    return redirect()->back();
  }

  /*
  /* Petición - AJAX
  */
  public function indexWithProducts(Request $request, $id)
  {
    if ($request->ajax())
      return response(Recipes::findOrFail($id));
  }

  public function getDataProduct(Request $request, $id)
  {
    if ($request->ajax())
      return response(Products_recipes::findOrFail($id));
  }

  public function getDataProductTienda(Request $request, $id)
  {
    if ($request->ajax())
      return response(DB::table('stores')
        ->join('products_recipes', 'stores.id', '=', 'products_recipes.store_id')
        ->select(
          'stores.id',
          'products_recipes.code',
          'products_recipes.name',
          'products_recipes.um',
          'products_recipes.id',
          'products_recipes.store_id'
        )
        ->where('products_recipes.store_id', $id)
        ->get());
  }
}
