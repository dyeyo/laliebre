<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopingCartController extends Controller
{
  public function index()
  {
    $shopping_carts = ShopingCart::with('recetas.productos.stores')->get();
    return view('shopping_carts.index',compact('shopping_carts'));
  }

  public function changeState($id)
  {
    $cart = ShopingCart::findOrFail($id);
    $cart->state = 2;
    $cart->update();
    return redirect()->route('shopping_carts');
  }
}
