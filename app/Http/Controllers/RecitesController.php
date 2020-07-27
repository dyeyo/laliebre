<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Products;
use App\ProductRecipe;
use App\Recipe;
use App\Stores;

class RecitesController extends Controller
{
  public function index()
  {
    $recipes = Recipe::all();
    $products = Products::all();
    $stores = Stores::all();

    return view('recites.index', compact('recipes','products','stores'));
  }

   public function show($id)
  {

    return view('recites.show');
  }

  public function store(Request $request)
  {
    // return $request->all();
    $recipe = new Recipe;
    $recipe->code = $request->input('code');
    $recipe->name = $request->input('name');
    $recipe->description = $request->input('description');
    $recipe->link = $request->input('link');
    $recipe->quantity = $request->input('quantity');
    $recipe->store_id = $request->input('store_id');
    $recipe->product_id = 1;
    $recipe->store = "...";

    $file = $request->file('image');
    $fileName = date_timestamp_get( date_create() ).$file->getClientOriginalName();
    \Storage::disk('recipes')->put($fileName,  \File::get($file));

    $recipe->image = $fileName;
    $recipe->save();

    $codes = $request->input('product_name');
    $quantities = $request->input('product_quantity');
    $units = $request->input('product_unit');

    $max = sizeof($codes);

    for ($i=0; $i < $max; $i++)
    {
      ProductRecipe::create([
        'recipe_id'  => $recipe->id,
        'product_id' => $codes[$i],
        'quantity'   => $quantities[$i],
        'um'         => $units[$i]
      ]);
    }

    Session::flash('message', 'Receta creada con exito');
    return redirect()->route('recetas');

  }

  public function edit(Request $request, $id)
  {

  }

  public function update(Request $request, $id)
  {

  }

  public function destroy($id)
  {
    $recipe = Recipe::findOrFail($id);

    \Storage::delete('public/recipes/'.$recipe->image);

    $productRecipe = ProductRecipe::all()->where('recipe_id', $id);

    foreach ($productRecipe as $pr)
    {
      $pr->delete();
    }

    $recipe->delete();

    Session::flash('message', 'La receta a sido eliminada con exito');
    return redirect()->route('recetas');

  }

  /*
  /* Petición - AJAX
  */
  public function indexWithProducts(Request $request, $id)
  {
    if ( $request->ajax() )
      return response( Recipe::findOrFail($id) );
  }

}
