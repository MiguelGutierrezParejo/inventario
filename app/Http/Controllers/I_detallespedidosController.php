<?php

namespace App\Http\Controllers;

use App\Models\I_detallespedido;
use App\Models\I_pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class I_detallespedidosController extends Controller
{
    public function editarpedido($id, Request $request)
    {
        $iddetalle = I_detallespedido::findOrFail($id);
        $idpedido = $iddetalle->IdPedido;
        $cantidadrecibida = $request->input('CantidadRecibida');

        //Finalizar pedidos
        $totaldetalles = I_pedido::find($idpedido)->detalles->count();
        $pedidosacero = I_pedido::find($idpedido)->detalles->where('Cantidad', '=', 0)->count();

        if ($pedidosacero == $totaldetalles) {
            DB::table('i_pedidos')->where('Id', $idpedido)->update(['Finalizado' => 1]);
        } else {
            DB::table('i_pedidos')->where('Id', $idpedido)->update(['Finalizado' => 0]);
        }

        DB::table('i_detallespedidos')->where('id', $iddetalle->Id)->update(['CantidadRecibida' => $cantidadrecibida]);

        return redirect()->back()->with('success', 'Cantidad recibida con éxito.');
    }
}
