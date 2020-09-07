<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
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
      if (Hash::check($user->password, $request->password_verificate)) {
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->role_id = 3;
        $user->password = Hash::make($request->password);
        $user->update();
        return response()->json(['status' => 'Usuario actualizado con exito'], 200);
      } else {
        return response()->json(['status' => 'Las contraseñas no es correcta '], 400);
      }
    }
  }

  public function updatePass(Request $request, $id)
  {
    if (!auth('api')->check()) {
      return response()->json(['error' => 'Unauthorized'], 401);
    } else {
      $user = User::find($id);
      if (!Hash::check($user->password, $request->password_verificate)) {
        $user->password = Hash::make($request->password);
        $user->update();
        return response()->json(['status' => 'Usuario actualizado con exito'], 200);
      } else {
        return response()->json(['status' => 'Las contraseñas no es correcta '], 400);
      }
    }
  }
}
