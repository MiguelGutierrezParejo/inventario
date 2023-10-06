<?php

namespace App\Http\Controllers;

use App\Models\I_detallespedido;
use App\Models\I_pedido;
use Illuminate\Support\Facades\DB;

class I_detallespedidosController extends Controller
{

    public function editarpedidos() {

        $idpedido = $_COOKIE['idpedido'];

        $cantidadrecibida = $_COOKIE['cantidadrecibida'];

        $iddetalle = $_COOKIE['iddetalle'];
     
        $pedido = I_detallespedido::find($iddetalle);

        //Finalizar pedidos 
        $totaldetalles = I_pedido::find($idpedido)->detalles->count();

        $pedidosacero = I_pedido::find($idpedido)->detalles->where('Cantidad', '=', 0)->count();

        if ($pedidosacero == $totaldetalles) {
            DB::table('i_pedidos')
            ->where('Id', $idpedido)
            ->update(['Finalizado' => 1]);
        } else {
            DB::table('i_pedidos')
            ->where('Id', $idpedido)
            ->update(['Finalizado' => 0]);
        }

        DB::table('i_detallespedidos')
            ->where('id', $iddetalle)
            ->update(['CantidadRecibida' => $cantidadrecibida]);

        return redirect()->route('pedidos' ,$pedido->IdPedido)->with('success', 'Cantidad recibida con éxito.');
    }  
}