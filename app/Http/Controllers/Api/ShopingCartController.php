<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Products_recipes;
use App\ShoppingCardProducts;
use Illuminate\Http\Request;
use App\ShoppingCart;

class ShopingCartController extends Controller
{
  //MI CARRITO SIN CONFIRMAR
  public function getShopingCart($id)
  {
    $shopingCart = ShoppingCart::with('recetas.productos')
      ->where('user_id', $id)
      ->where('state', 3)
      ->get();
    if ($shopingCart) {
      return response()->json([
        'carrito' => $shopingCart,
      ], 200);
    } else {
      return response()->json([
        'error' => 'No existen datos',
      ], 404);
    }
  }

  //HISTORIAL DE RECETAS CONFIRMADOS Y DESPACHADOS
  public function shoppingCartConfirmed($id)
  {
    if (!auth('api')->check()) {
      return response()->json(['error' => 'Unauthorized'], 401);
    } else {
      $shopingCart = ShoppingCart::with('recetas.productos')
        ->where('user_id', $id)
        ->where('state', 1)
        ->get();
      if ($shopingCart) {
        return response()->json([
          'carrito' => $shopingCart,
        ], 200);
      } else {
        return response()->json([
          'error' => 'No existen datos',
        ], 404);
      }
    }
  }

  public function confirmCartRecipe(Request $request, $id)
  {
    if (!auth('api')->check()) {
      return response()->json(['error' => 'Unauthorized'], 401);
    } else {
      ShoppingCart::where('state', 3)->where('user_id', $id)->update([
        'state' => 2,
        'address' => $request->address
      ]);
      return response()->json([
        'msj' => "Estado en aprobado",
      ], 200);
    }
  }

  public function addRecipe(Request $request)
  {
    $cart = new ShoppingCart();
    $cart->recipes_id = $request->recipes_id;
    $cart->quantity = $request->quantity;
    $cart->state = 3;
    $cart->total = $request->total;
    $cart->user_id = $request->user_id;
    $cart->save();
    return response()->json([
      'status' => 'Pedido agregada con exito',
    ], 200);
  }

  public function removeShopingCart($id)
  {
    $shopingCart = ShoppingCart::find($id);
    if ($shopingCart) {
      $shopingCart->delete();
      return response()->json([
        'status' => 'Item eliminado del carrito',
      ], 200);
    } else {
      return response()->json([
        'status' => 'ID no existe',
      ], 404);
    }
  }

  /**CARRITO PARA PRODUCTOS */

  //MI CARRITO SIN CONFIRMAR
  public function shoppingCartProd($id)
  {
    $shopingCart = ShoppingCardProducts::with('productos.stores')
      ->where('user_id', $id)
      ->where('state', 3)
      ->get();
    if ($shopingCart) {
      return response()->json([
        'carrito' => $shopingCart,
      ], 200);
    } else {
      return response()->json([
        'error' => 'No existen datos',
      ], 404);
    }
  }

  //HISTORIAL DE PEDIDOS CONFIRMADOS Y DESPACHADOS
  public function shoppingCartProdConfirmed($id)
  {
    if (!auth('api')->check()) {
      return response()->json(['error' => 'Unauthorized'], 401);
    } else {
      $shopingCart = ShoppingCardProducts::with('productos.stores', 'user')
        ->where('user_id', $id)
        ->where('state', 1)
        ->get();
      if ($shopingCart) {
        return response()->json([
          'carrito' => $shopingCart,
        ], 200);
      } else {
        return response()->json([
          'error' => 'No existen datos',
        ], 404);
      }
    }
  }

  public function confirmCartProd(Request $request, $id)
  {
    if (!auth('api')->check()) {
      return response()->json(['error' => 'Unauthorized'], 401);
    } else {
      ShoppingCardProducts::where('state', 3)->where('user_id', $id)->update([
        'state' => 2,
        'address' => $request->address
      ]);
      return response()->json([
        'estado' => 'Pedido confirmado',
      ], 200);
    }
  }

  public function addShoppingCartProd(Request $request)
  {
    if (!auth('api')->check()) {
      return response()->json(['error' => 'Unauthorized'], 401);
    } else {
      $cart = new ShoppingCardProducts();
      $cart->product_id = $request->product_id;
      $cart->quantity = $request->quantity;
      $cart->state = 3;
      $cart->total = $request->total;
      $cart->user_id = $request->user_id;
      $storeID =  Products_recipes::select('store_id')->where('id', $cart->product_id)->get();
      foreach ($storeID as $tienda) {
        $store_id = $tienda->store_id;
      }
      $cart->store_id = $store_id;
      $cart->save();

      return response()->json([
        'status' => 'Pedido agregado con exito',
      ], 200);
    }
  }

  public function removeShopingCartProd($id)
  {
    if (!auth('api')->check()) {
      return response()->json(['error' => 'Unauthorized'], 401);
    } else {
      $shopingCart = ShoppingCardProducts::find($id);
      if ($shopingCart) {
        $shopingCart->delete();
        return response()->json([
          'status' => 'Item eliminado del carrito',
        ], 200);
      } else {
        return response()->json([
          'status' => 'ID no existe',
        ], 404);
      }
    }
  }
}
