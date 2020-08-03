<?php

namespace App\Http\Controllers;

use App\CategoriesStore;
use App\Districts;
use App\Stores;
use App\User;
use Illuminate\Http\Request;
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
    $store->district_id = $request->district_id;
    $store->store_id = $request->store_id;
    if ($request->hasFile('logo')) {
      $file = $request->file('logo');
      $name1 = $file->getClientOriginalName();
      $file->move(public_path() . '/img/stores/', $name1);
      $store->logo = $name1;
    }

    // $this->validate($request(), [
    //   'email' => 'required|email|unique:users',
    //   'password' => 'required',
    // ]);

    $user = new User();
    $user->email = $request->emailUser;
    $user->password = Hash::make($request->password);
    $user->role_id = 2;
    $user->save();

    $store->user_id = $user->id;
    $store->save();

//    dd($user->id);

    Session::flash('message', 'Tienda y usuario creado con exito');
    return redirect()->route('stores');
  }

  public function edit(Request $request, $id)
  {
    $store = Stores::with('typeStore', 'distritos')->find($id);
    $typeStores = CategoriesStore::all();
    $distritos = Districts::all();

    return view('stores.edit', compact('store', 'typeStores', 'distritos'));
  }

  public function update(Request $request, $id)
  {
    $store = Stores::find($id);
    $store->name = $request->name;
    $store->description = $request->description;
    $store->district_id = $request->district_id;
    if ($request->hasFile('logo')) {
      $file = $request->file('logo');
      $name1 = $file->getClientOriginalName();
      $file->move(public_path() . '/img/stores/', $name1);
      $store->logo = $name1;
    }
    $store->update();
    Session::flash('message', 'Categoria editado con exito');
    return redirect()->route('stores');
  }

  public function destroy($id)
  {
    Stores::find($id)->delete();
    Session::flash('message', 'Categoria eliminado con exito');
    return redirect()->route('stores');
  }
}
