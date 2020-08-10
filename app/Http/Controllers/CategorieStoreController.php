<?php

namespace App\Http\Controllers;

use App\CategoriesStore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategorieStoreController extends Controller
{
  public function index()
  {
    $typeStores = CategoriesStore::all();
    return view('typeStore.index', compact('typeStores'));
  }

  public function store(Request $request)
  {
    $typeStores = new CategoriesStore;
    $typeStores->name = $request->name;
    if ($request->hasFile('image')) {
      $file = $request->file('image');
      $name1 = $file->getClientOriginalName();
      $file->move(public_path() . '/img/typeStore/', $name1);
      $typeStores->image = $name1;
    }
    $typeStores->save();
    Session::flash('message', 'Categoria creado con exito');
    return redirect()->route('typeStore');
  }

  public function edit(Request $request, $id)
  {
    $typeStores = CategoriesStore::find($id);
    return view('typeStore.edit', compact('typeStores'));
  }

  public function update(Request $request, $id)
  {
    $typeStores = CategoriesStore::find($id);
    $typeStores->name = $request->name;
    if ($request->hasFile('logo')) {
      $file = $request->file('logo');
      $name1 = $file->getClientOriginalName();
      $file->move(public_path() . '/images/typeSotre/', $name1);
      $typeStores->image = $name1;
    }
    $typeStores->save();
    Session::flash('message', 'Categoria editado con exito');
    return redirect()->route('typeStore');
  }

  public function destroy($id)
  {
    CategoriesStore::find($id)->delete();
    Session::flash('message', 'Categoria eliminado con exito');
    return redirect()->route('typeStore');
  }
}
