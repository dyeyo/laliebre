<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Districts;

class DistrictsController extends Controller
{
  public function index()
  {
    if ( ! auth('api')->check()) {
      return response()->json(['error' => 'Unauthorized'], 401);
  } else{
    $districts = Districts::all();
  }
  }


  public function store(Request $request)
  {
    if ( ! auth('api')->check()) {
      return response()->json(['error' => 'Unauthorized'], 401);
  } else{ Districts::create($request->all());
  }
  }

  public function edit(Request $request, $id)
  {
    if ( ! auth('api')->check()) {
      return response()->json(['error' => 'Unauthorized'], 401);
  } else{ $district = Districts::find($id);}

  }

  public function update(Request $request, $id)
  {
    if ( ! auth('api')->check()) {
      return response()->json(['error' => 'Unauthorized'], 401);
  } else{ $district = Districts::find($id);
      $district->name = $request->name;
      $district->save();
  }
  }

  public function destroy($id)
  {
    if ( ! auth('api')->check()) {
      return response()->json(['error' => 'Unauthorized'], 401);
  } else{Districts::find($id)->delete();}

  }
}
