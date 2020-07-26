<?php

namespace App\Http\Controllers\Api;
use App\CategoriesProducts;
use App\Hallways;
use App\Products;
use App\Stores;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if ( ! auth('api')->check()) {
        return response()->json(['error' => 'Unauthorized'], 401);
    } else{$products = Products::all();
            $categories = CategoriesProducts::all();
            $stores = Stores::all();
            $hallways = Hallways::all();}

    }


    public function store(Request $request)
    {
      if ( ! auth('api')->check()) {
        return response()->json(['error' => 'Unauthorized'], 401);
    } else{      $product = new Products($request->all());
            $product->update($request->all());
            if ($request->hasFile('image')) {
              $file = $request->file('image');
              $name1 = $file->getClientOriginalName();
              $file->move(public_path() . '/img/products/', $name1);
              $product->image = $name1;
            }
            $product->save();
          }

    }


    public function update(Request $request, $id)
    {
      if ( ! auth('api')->check()) {
        return response()->json(['error' => 'Unauthorized'], 401);
    } else{       $product = Products::find($id);
            $product->update($request->all());
            if ($request->hasFile('image')) {
              $file = $request->file('image');
              $name1 = $file->getClientOriginalName();
              $file->move(public_path() . '/img/products/', $name1);
              $product->image = $name1;
            }
            $product->update();
          }
    }

    public function destroy($id)
    {
      if ( ! auth('api')->check()) {
        return response()->json(['error' => 'Unauthorized'], 401);
    } else{Products::find($id)->delete();}

    }
}
