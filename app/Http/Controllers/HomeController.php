<?php

namespace App\Http\Controllers;

use App\ShoppingCardProducts;
use App\ShoppingCart;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  {
    $totalVentasProd = ShoppingCardProducts::with('productos.stores', 'user')->where('state', 1)->count();
    $totalVentasRecetas = ShoppingCart::with('recetas.productos.sotre', 'user')->where('state', 1)->count();
    $totalUsuarios = User::where('role_id', 3)->count();
    return view('home', compact(
      'totalVentasProd',
      'totalVentasRecetas',
      'totalUsuarios'
    ));
  }
}
