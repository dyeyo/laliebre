<?php

namespace App\Http\Controllers;

use App\CategoriesStore;
use App\Districts;
use App\DistritosStore;
use App\Stores;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class StoreController extends Controller
{
  public function index()
  {
    $stores = Stores::all();
    $typeStores = CategoriesStore::all();
    $distritos = Districts::all();
    return view('stores.index', compact('stores', 'typeStores', 'distritos'));
  }


  public function store(Request $request)
  {
    $store = new Stores();
    $store->name = $request->name;
    $store->description = $request->description;
    $store->store_id = $request->store_id;
    if ($request->hasFile('logo')) {
      $file = $request->file('logo');
      $name1 = $file->getClientOriginalName();
      $file->move(public_path() . '/img/stores/', $name1);
      $store->logo = $name1;
    }

    $user = new User();
    $user->email = $request->emailUser;
    $user->name = $store->name;
    $user->password = Hash::make($request->password);
    $user->role_id = 2;
    $user->save();

    $store->user_id = $user->id;
    $store->save();

    foreach ($request->district_id as $key => $value) {
      $distritoId = Stores::findOrFail($store->id);
      $distritoId->store()->attach($value);
    }
    $store->save();
    //    dd($user->id);

    Session::flash('message', 'Tienda y usuario creado con exito');
    return redirect()->route('stores');
  }

  public function edit(Request $request, $id)
  {
    $store = Stores::with('typeStore')->find($id);
    $typeStores = CategoriesStore::all();
    $distritos = Districts::all();
    $storeDistritos = DB::table('districts')
      ->select(
        'districts.id',
        'districts.name',
        'distritos_store_stores.id as distritos_store_stores_id',
        'distritos_store_stores.distritos_store_id',
        'distritos_store_stores.stores_id'
      )
      ->join('distritos_store_stores', 'districts.id', '=', 'distritos_store_stores.distritos_store_id')
      ->where('distritos_store_stores.stores_id', $id)
      ->get();
    return view('stores.edit', compact('store', 'typeStores', 'distritos', 'storeDistritos'));
  }

  public function update(Request $request, $id)
  {
    $store = Stores::find($id);
    $store->name = $request->name;
    $store->description = $request->description;
    if ($request->hasFile('logo')) {
      $file = $request->file('logo');
      $name1 = $file->getClientOriginalName();
      $file->move(public_path() . '/img/stores/', $name1);
      $store->logo = $name1;
    }
    $store->user_id = $store->user_id;
    $store->update();

    foreach ($request->district_id as $key => $value) {
      $distritoId = Stores::findOrFail($store->id);
      $distritoId->store()->attach($value);
    }
    $store->save();
    Session::flash('message', 'Tienda editado con exito');
    return redirect()->route('stores');
  }

  public function destroy($id)
  {
    $store = Stores::find($id);
    User::select('stores.user_id', 'users.id', 'users.name')
      ->join('stores', 'users.id', 'stores.user_id')
      ->where('users.id', $store->user_id)
      ->delete();
    Stores::where('id', $id)->delete();
    Session::flash('message', 'Tienda eliminado con exito');
    return redirect()->route('stores');
  }

  public function destroyDistrito($id)
  {
    DB::table('distritos_store_stores')->where('id', $id)->delete();
    Session::flash('message', 'Distrito eliminado con exito');
    return redirect()->back();
  }
}
