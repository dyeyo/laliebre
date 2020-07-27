<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
  public function __construct()
  {
    //$this->middleware('auth:api', ['except' => ['login']]);
  }

  public function login()
  {
    $credentials = request(['email', 'password']);

    if (!$token = auth('api')->attempt($credentials)) {
      return response()->json(['error' => 'Unauthorized'], 401);
    }

    return $this->respondWithToken($token);
  }

  public function me()
  {
    if (!auth('api')->check()) {
      return response()->json(['error' => 'Unauthorized'], 401);
    }
    return response()->json(auth('api')->user());
  }

  public function logout()
  {
    auth('api')->logout();

    return response()->json(['message' => 'Successfully logged out']);
  }

  public function refresh()
  {
    return $this->respondWithToken(auth('api')->refresh());
  }


  protected function respondWithToken($token)
  {
    return response()->json([
      'access_token' => $token,
      'token_type' => 'bearer',
      'expires_in' => auth('api')->factory()->getTTL() * 60
    ]);
  }

  public function register(Request $request)
  {
    $user = new User();
    $user->name = $request->name;
    $user->lastname = $request->lastname;
    $user->phone = $request->phone;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->role_id = 3;
    if ($request->hasFile('picture')) {
      $file = $request->file('picture');
      $name1 = $file->getClientOriginalName();
      $file->move(public_path() . '/img/users/', $name1);
      $user->picture = $name1;
    }
    $user->save();
    return response()->json(['status' => 'Usuario registrado con exito'], 200);
  }
}
