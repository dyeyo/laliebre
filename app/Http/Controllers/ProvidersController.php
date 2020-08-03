<?php

namespace App\Http\Controllers;

use App\Providers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProvidersController extends Controller
{
  public function index()
  {
    $providers = Providers::all();
    return view('providers.index', compact('providers'));
  }


  public function store(Request $request)
  {
    Providers::create($request->all());
    Session::flash('message', 'Proveedor creado con exito');
    return redirect()->route('proveedores');
  }

  public function edit(Request $request, $id)
  {
    $provider = Providers::find($id);
    return view('providers.edit', compact('provider'));
  }

  public function update(Request $request, $id)
  {
    $providers = Providers::find($id);
    $providers->name = $request->name;
    $providers->save();
    Session::flash('message', 'Proveedor editado con exito');
    return redirect()->route('proveedores');
  }

  public function destroy($id)
  {
    Providers::find($id)->delete();
    Session::flash('message', 'Proveedor eliminado con exito');
    return redirect()->route('proveedores');
  }
}
