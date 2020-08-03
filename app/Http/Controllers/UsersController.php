<?php

namespace App\Http\Controllers;

use App\Roles;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
  public function index()
  {
    $users = User::all();
    $role = Roles::all();
    return view('users.index', compact('users', 'role'));
  }

  public function store(Request $request)
  {
    $this->validate($request(), [
      'name' => 'required',
      'lastname' => 'required',
      'email' => 'required|email|unique:users',
      'password' => 'required',
      'role_id' => 'required'
    ]);
    $user = User::create($request->all());
    auth()->login($user);
    return redirect()->to('/login');
  }

  public function edit($id)
  {
    $user = User::findOrFail($id);
    $role = Roles::all();
  }
}
