<?php

namespace App\Http\Controllers;

use App\Hallways;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HallwaysController extends Controller
{
  public function index()
  {
    $hallways = Hallways::all();
    return view('hallways.index', compact('hallways'));
  }


  public function store(Request $request)
  {
    Hallways::create($request->all());
    Session::flash('message', 'Pasillo creado con exito');
    return redirect()->route('pasillos');
  }

  public function edit(Request $request, $id)
  {
    $hallway = Hallways::find($id);
    return view('hallways.edit', compact('hallway'));
  }

  public function update(Request $request, $id)
  {
    $hallways = Hallways::find($id);
    $hallways->name = $request->name;
    $hallways->save();
    Session::flash('message', 'Pasillo editado con exito');
    return redirect()->route('pasillos');
  }

  public function destroy($id)
  {
    Hallways::find($id)->delete();
    Session::flash('message', 'Pasillo eliminado con exito');
    return redirect()->route('pasillos');
  }
}
