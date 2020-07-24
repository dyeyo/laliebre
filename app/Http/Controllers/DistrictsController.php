<?php

namespace App\Http\Controllers;

use App\Districts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DistrictsController extends Controller
{
    public function index()
    {
        $districts = Districts::all();
        return view('districts.index', compact('districts'));
    }


    public function store(Request $request)
    {
        Districts::create($request->all());
        Session::flash('message', 'Distrito creado con exito');
        return redirect()->route('distritos');
    }

    public function edit(Request $request, $id)
    {
        $district = Districts::find($id);
        return view('districts.edit', compact('district'));
    }

    public function update(Request $request, $id)
    {
        $district = Districts::find($id);
        $district->name = $request->name;
        $district->save();
        Session::flash('message', 'Distrito editado con exito');
        return redirect()->route('distritos');
    }

    public function destroy($id)
    {
        Districts::find($id)->delete();
        Session::flash('message', 'Distrito eliminado con exito');
        return redirect()->route('distritos');
    }
}
