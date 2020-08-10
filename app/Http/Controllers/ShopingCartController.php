<?php

namespace App\Http\Controllers;

use App\ShoppingCardProducts;
use Illuminate\Http\Request;
use App\ShoppingCart;
use Illuminate\Support\Facades\Session;

class ShopingCartController extends Controller
{
  public function index()
  {
    $shopping_carts = ShoppingCart::with('recetas.productos.sotre', 'user')->where('state', 1)->get();
    return view('shopping_carts.index', compact('shopping_carts'));
  }

  public function show($id)
  {
    $pedido = ShoppingCart::with('recetas.productos.sotre', 'user')->find($id);
    return view('shopping_carts.details', compact('pedido'));
  }

  public function changeState($id)
  {
    $cart = ShoppingCart::findOrFail($id);
    $cart->state = 2;
    $cart->update();
    sSession::flash('message', 'El producto se cambiado a estado Despachado con exito');
    return redirect()->route('shopping_cart_prod');
  }
}
