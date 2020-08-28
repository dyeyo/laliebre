<?php

namespace App\Http\Controllers;

use App\CategoriesStore;
use App\Districts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CategorieStoreController extends Controller
{
  public function index()
  {
    $typeStores = CategoriesStore::all();
    $distritos = Districts::all();
    return view('typeStore.index', compact('typeStores', 'distritos'));
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
    foreach ($request->district_id as $key => $value) {
      $distritoId = CategoriesStore::findOrFail($typeStores->id);
      $distritoId->stores()->attach($value);
    }
    $typeStores->save();
    Session::flash('message', 'Categoria creado con exito');
    return redirect()->route('typeStore');
  }

  public function edit(Request $request, $id)
  {
    $typeStores = CategoriesStore::find($id);
    $distritos = Districts::all();
    $storeDistritos = DB::table('districts')
      ->select(
        'districts.id',
        'districts.name',
        'categories_store_distritos_store.id as distritos_store_stores_id',
        'categories_store_distritos_store.distritos_store_id',
        'categories_store_distritos_store.categories_store_id'
      )
      ->join('categories_store_distritos_store', 'districts.id', '=', 'categories_store_distritos_store.distritos_store_id')
      ->where('categories_store_distritos_store.categories_store_id', $id)
      ->get();
    return view('typeStore.edit', compact('typeStores', 'distritos', 'storeDistritos'));
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
    $typeStores->update();
    
    if($request->district_id){
        foreach ($request->district_id as $key => $value) {
          $distritoId = CategoriesStore::findOrFail($typeStores->id);
          $distritoId->stores()->attach($value);
        }
        $typeStores->save();
    }
    

    Session::flash('message', 'Categoria editado con exito');
    return redirect()->route('typeStore');
  }

  public function destroy($id)
  {
    CategoriesStore::find($id)->delete();
    Session::flash('message', 'Categoria eliminado con exito');
    return redirect()->route('typeStore');
  }

  public function destroyDistrito($id)
  {
    DB::table('categories_store_distritos_store')->where('id', $id)->delete();
    Session::flash('message', 'Distrito eliminado con exito');
    return redirect()->back();
  }
}
