<?php

namespace App\Http\Controllers;

use App\CategoriesProducts;
use App\Products;
use App\Stores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Products::all();
        $categories = CategoriesProducts::all();
        $stores = Stores::all();
        return view('products.index', compact('products', 'categories', 'stores'));
    }


    public function store(Request $request)
    {
        $product = new Products($request->all());
        $product->update($request->all());
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name1 = $file->getClientOriginalName();
            $file->move(public_path() . '/img/products/', $name1);
            $product->image = $name1;
        }
        $product->save();
        Session::flash('message', 'Producto creado con exito');
        return redirect()->route('products');
    }

    public function edit(Request $request, $id)
    {
        $product = Products::find($id);
        $categories = CategoriesProducts::all();
        $stores = Stores::all();
        return view('products.edit', compact('product', 'categories', 'stores'));
    }

    public function update(Request $request, $id)
    {
        $product = Products::find($id);
        $product->update($request->all());
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name1 = $file->getClientOriginalName();
            $file->move(public_path() . '/img/products/', $name1);
            $product->image = $name1;
        }
        $product->update();
        Session::flash('message', 'Producto editado con exito');
        return redirect()->route('products');
    }

    public function destroy($id)
    {
        Products::find($id)->delete();
        Session::flash('message', 'Producto eliminado con exito');
        return redirect()->route('products');
    }
}
