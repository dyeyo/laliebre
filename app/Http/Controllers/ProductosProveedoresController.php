<?php

namespace App\Http\Controllers;

use App\ShoppingCardProducts;
use Illuminate\Http\Request;

class ProductosProveedoresController extends Controller
{
  public function index()
  {
    $prod = ShoppingCardProducts::with('productos.proveedores')->get();
    // dd($prod);
    return view('ventas.productos', compact('prod'));
  }
}
