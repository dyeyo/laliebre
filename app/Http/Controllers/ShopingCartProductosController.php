<?php

namespace App\Http\Controllers;

use App\ShoppingCardProducts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Stores;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ShopingCartProductosController extends Controller
{
  //INFO FUNCION PARA PEDIDOS GENERALES
  public function index()
  {
    $shopping_carts = ShoppingCardProducts::with('productos.stores', 'user')->where('state', 2)->get();
    // dd($shopping_carts);
    return view('shopping_carts_productos.index', compact('shopping_carts'));
  }

  //INFO FUNCION PARA PEDIDOS X TIENDA
  public function pedidosStore()
  {
    $tiendaUser = Stores::where('id',Auth::user()->id)->get();
    foreach($tiendaUser as $item)
    {
      $idTienda=$item->id;
    }
    $shopping_carts = ShoppingCardProducts::select(
      'shopping_card_products.id as idCarrito',
      'shopping_card_products.state',
      'productos.code',
      'productos.name as nombreProducto',
      'productos.um',
      'productos.image',
      'tienda.id',
      'productos.store_id',
      'usuarios.id',
      'usuarios.name',
      'usuarios.lastname'
    )
      ->join('stores as tienda', 'shopping_card_products.store_id', '=', 'tienda.id')
      ->join('products_recipes as productos', 'shopping_card_products.product_id', '=', 'productos.id')
      ->join('users as usuarios', 'shopping_card_products.user_id', '=', 'usuarios.id')
      ->where('shopping_card_products.store_id', $idTienda)
      ->where('shopping_card_products.state',2)
      ->get();
    return view('shopping_carts_productos.misPedidos', compact('shopping_carts'));
  }

  public function show($id)
  {
    //  $pedido = ShoppingCardProducts::with('productos.stores', 'user')->find($id);
    $pedido = ShoppingCardProducts::select(
      'shopping_card_products.id as carritoID',
      'shopping_card_products.user_id',
      'shopping_card_products.total',
      'shopping_card_products.quantity',
      'productos.id as productoID',
      'productos.code',
      'productos.name',
      'productos.um',
      'productos.image',
      'productos.store_id',
      'tienda.id as tiendaID',
      'tienda.name as tiendaName',
      'tienda.logo',
      'usuarios.id as userID',
      'usuarios.name as userName',
      'usuarios.lastname as userLastName',
      'usuarios.phone'
    )
      ->join('stores as tienda', 'shopping_card_products.store_id', '=', 'tienda.id')
      ->join('products_recipes as productos', 'shopping_card_products.product_id', '=', 'productos.id')
      ->join('users as usuarios', 'shopping_card_products.user_id', '=', 'usuarios.id')
      ->where('shopping_card_products.user_id', $id)
      ->where('shopping_card_products.state', 2)
      ->get();

      $usuarioPedido = ShoppingCardProducts::select(
        'shopping_card_products.id as carritoID',
        'shopping_card_products.user_id',
        'shopping_card_products.total',
        'shopping_card_products.quantity',
        'users.id',
        'users.name',
        'users.lastname',
        'users.phone'
      )
        ->join('users', 'shopping_card_products.user_id', '=', 'users.id')
        ->where('shopping_card_products.user_id', $id)
        ->where('shopping_card_products.state', 2)
        ->first();  
    return view('shopping_carts_productos.details', compact('pedido','usuarioPedido'));
  }

  public function changeState($id)
  {
    $cart = ShoppingCardProducts::findOrFail($id);
    $cart->state = 1;
    $cart->update();
    return redirect()->route('shopping_cart_prod');
  }

  public function changeStateAdmin($id)
  {
    $cart = ShoppingCardProducts::findOrFail($id);
    $cart->state = 1;
    $cart->update();
    Session::flash('message', 'El producto se cambiado a estado Despachado con exito');
    return redirect()->route('shopping_cart_prod');
  }
}
