<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\agregarEliminarIngrediente;
use DB;

class AgregarEliminarIngredienteController extends Controller
{
    public function aeliminarIngrediente(Request $request, $receta_id , $producto_id)
    {
      try {
        DB::transaction( function() use ($request, $receta_id, $producto_id){
         $aeIngredientes = new agregarEliminarIngrediente();
         $aeIngredientes->nombre_ingrediente = $request->nombre_ingrediente;
         if ($request->agregar_cantidad >0 || $request->agregar_cantidad != null) {
           $aeIngredientes->agregar_cantidad = $request->agregar_cantidad;
         }
           if ($request->restar_cantidad > 0 || $request->restar_cantidad != null) {
              $aeIngredientes->restar_cantidad = $request->restar_cantidad;
           }else {
            $aeIngredientes->eliminar_cantidad = null;
           }
            $aeIngredientes->recipes_id = $receta_id;
            $aeIngredientes->products_recipes_id = $producto_id;
            $aeIngredientes->save();
            return ["mensaje" => 'registro agregado con exito'];
        }, 5);
      } catch (Exception $e) {
        throw new Exception("Error Processing Request" . $e , 1);
        
      }
    }
}
