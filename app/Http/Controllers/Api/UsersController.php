<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
  public function show($id)
  {
    if (!auth('api')->check()) {
      return response()->json(['error' => 'Unauthorized'], 401);
    } else {
      return response()->json(User::find($id));
    }
  }

  public function update(Request $request, $id)
  {
    if (!auth('api')->check()) {
      return response()->json(['error' => 'Unauthorized'], 401);
    } else {
      $user = User::find($id);
      if ($request->password == '') {
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->role_id = 3;
        if ($request->hasFile('picture')) {
          $file = $request->file('picture');
          $name1 = $file->getClientOriginalName();
          $file->move(public_path() . '/img/clientes/', $name1);
          $user->picture = $name1;
        }
      } else {
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->role_id = 3;
        $user->address = $request->address;
        if ($request->hasFile('picture')) {
          $file = $request->file('picture');
          $name1 = $file->getClientOriginalName();
          $file->move(public_path() . '/img/clientes/', $name1);
          $user->picture = $name1;
        }
      }
      $user->update();
      return response()->json(['status' => 'Usuario actualizado con exito'], 200);
    }
  }



  public function changeImg(Request $request, $id)
  {
    $user = User::find($id);
    Storage::delete($user->picture);

    $user->picture = $request->picture->store('');
    $user->update();
  }
}
