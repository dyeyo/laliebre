<?php

namespace App\Http\Controllers\Api;

use App\CategoriesProducts;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriesController extends Controller
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
    } else{ return  $categories = CategoriesProducts::all();}

    }


    public function store(Request $request)
    {

        if ( ! auth('api')->check()) {
          return response()->json(['error' => 'Unauthorized'], 401);
      } else{
        $category = new CategoriesProducts($request->all());
          $category->save();
      }
    }



    public function update(Request $request, $id)
    {

      if ( ! auth('api')->check()) {
        return response()->json(['error' => 'Unauthorized'], 401);
    } else{
      $category = CategoriesProducts::find($id);
        $category->update($request->all());}

    }

    public function destroy($id)
    {
      if ( ! auth('api')->check()) {
        return response()->json(['error' => 'Unauthorized'], 401);
    } else{
      CategoriesProducts::find($id)->delete();
    }
    }
}
