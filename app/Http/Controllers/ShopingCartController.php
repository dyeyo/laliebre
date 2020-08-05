<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShoppingCart;

class ShopingCartController extends Controller
{
  public function index()
  {
    $shopping_carts = ShoppingCart::with('recetas.productos.store')->get();
    return view('shopping_carts.index', compact('shopping_carts'));
  }

  public function changeState($id)
  {
    $cart = ShoppingCart::findOrFail($id);
    $cart->state = 2;
    $cart->update();
    return redirect()->route('shopping_carts');
  }
}
