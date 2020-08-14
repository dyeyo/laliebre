<?php

namespace App\Http\Controllers;

use App\Roles;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

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

  public function show()
  {
    $user = User::where('id', Auth::user()->id)->first();
    return view('users.show', compact('user'));
  }

  public function update(Request $request, $id)
  {
    $user = User::find($id);
    if ($request->password == '') {
      $user->name = $request->name;
      $user->lastname = $request->lastname;
      $user->phone = $request->phone;
      $user->email = $request->email;
      $user->address = $request->address;
      if ($request->hasFile('picture')) {
        $file = $request->file('picture');
        $name1 = $file->getClientOriginalName();
        $file->move(public_path() . '/img/users/', $name1);
        $user->picture = $name1;
      }
    } else {
      $user->name = $request->name;
      $user->lastname = $request->lastname;
      $user->phone = $request->phone;
      $user->email = $request->email;
      $user->address = $request->address;
      if ($request->hasFile('picture')) {
        $file = $request->file('picture');
        $name1 = $file->getClientOriginalName();
        $file->move(public_path() . '/img/users/', $name1);
        $user->picture = $name1;
      }
      $user->password = Hash::make($request->password);
    }
    $user->update();
    Session::flash('message', 'Usuario editado con Exito');
    return redirect('home');
  }
}
