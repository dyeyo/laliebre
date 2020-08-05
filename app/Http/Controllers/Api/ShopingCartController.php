<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ShoppingCart;
use Illuminate\Support\Facades\Auth;

class ShopingCartController extends Controller
{
  public function getShopingCart($id)
  {
    $shopingCart = ShoppingCart::with('recetas.productos')
      ->where('user_id', Auth::user()->id)
      ->findOrFail($id);
    return response()->json([
      'carrito' => $shopingCart,
    ], 200);
  }

  public function addRecipe(Request $request)
  {
    $cart = new ShoppingCart();
    $cart->recipes_id = $request->recipes_id;
    $cart->user_id = Auth::user()->id;
    $cart->save();
    return response()->json([
      'status' => 'Pedido agregada con exito',
    ], 200);
  }

  public function removeShopingCart($id)
  {
    $shopingCart = ShoppingCart::findOrFail($id);
    $shopingCart->delete();
    return response()->json([
      'msg' => 'Item eliminado del carrito',
    ], 200);
  }
}
