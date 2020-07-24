<?php

namespace App\Http\Controllers;

use App\CategoriesProducts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = CategoriesProducts::all();
        return view('categories.index', compact('categories'));
    }


    public function store(Request $request)
    {
        $category = new CategoriesProducts($request->all());
        $category->save();
        Session::flash('message', 'Categoria creado con exito');
        return redirect()->route('categories');
    }

    public function edit(Request $request, $id)
    {
        $category = CategoriesProducts::find($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = CategoriesProducts::find($id);
        $category->update($request->all());
        Session::flash('message', 'Categoria editado con exito');
        return redirect()->route('categories');
    }

    public function destroy($id)
    {
        CategoriesProducts::find($id)->delete();
        Session::flash('message', 'Categoria eliminado con exito');
        return redirect()->route('categories');
    }
}
