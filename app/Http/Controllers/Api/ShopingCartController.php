<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopingCartController extends Controller
{
  public function getShopingCart($id)
  {
    $shopingCart = ShopingCart::with('recetas.productos.stores')->findOrFail($id);
    return response()->json([
      'carrito' => $shopingCart,
    ], 200);
  }

  public function addRecipe(Request $request)
  {
    $cart = new ShopingCart;
    $cart->recipes_id = $request->recipes_id;
    $cart->state = 1;
    $cart->save();
    return response()->json([
      'status' => 'Pedido agregada con exito',
    ], 200);
  }

  public function removeShopingCart($id)
  {
    $shopingCart = ShopingCart::findOrFail($id);
    $shopingCart->delete();
    return response()->json([
      'msg' => 'Item eliminado del carrito',
    ], 200);
  }
}
