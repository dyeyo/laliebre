<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

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
      $user->name = $request->name;
      $user->lastname = $request->lastname;
      $user->email = $request->email;
      $user->phone = $request->phone;
      $user->address = $request->address;
      $user->role_id = 3;
      return response()->json(['status' => 'Usuario actualizado con exito'], 200);
    }
  }

  public function updatePass(Request $request, $id)
  {
    if (!auth('api')->check()) {
      return response()->json(['error' => 'Unauthorized'], 401);
    } else {
      $user = User::find($id);
      if (Hash::check($request->password_verificate, $user->password)) {
        $user->password = Hash::make($request->password);
        $user->update();
        return response()->json(['status' => 'Usuario actualizado con exito'], 200);
      } else {
        return response()->json(['status' => 'La contraseña actual no es correcta'], 400);
      }
    }
  }

  public function changeImg(Request $request, $id)
  {
    dd($request->all());
    $user = User::find($id);
    if ($request->hasFile('picture')) {
      $file = $request->file('picture');
      $name1 = $file->getClientOriginalName();
      $file->move(public_path() . '/img/users/', $name1);
      $user->picture = $name1;
    }
    $user->update();
    return response()->json(['status' => 'Usuario actualizado con exito'], 200);
  }
}
