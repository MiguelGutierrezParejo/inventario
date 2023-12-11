<?php

namespace App\Http\Controllers;

use App\Models\I_consumible;
use App\Models\I_pedido;
use App\Models\I_recepcionpedido;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class I_recepcionpedidosController extends Controller
{

    public function create($IdPedido) {

        $recepcion = new I_recepcionpedido();

        $pedido = I_pedido::find($IdPedido);

        return view('i_recepcionpedidos.create', [
            'recepcion' => $recepcion,
            'pedido' => $pedido,

        ]);

    }

    public function todos($IdPedido) {

        $recepcion = new I_recepcionpedido();

        $pedido = I_pedido::find($IdPedido);

        return view('i_recepcionpedidos.todos', [
            'recepcion' => $recepcion,
            'pedido' => $pedido,

        ]);
    }

    private function validar()
    {
        $validados = request()->validate([

            'IdPedido' => 'required',
            'Albaran' => 'mimes:pdf',
            'Observaciones' => 'nullable|max:255',
        ]);


        return $validados;
    }

    public function store() {

        $validados = $this->validar();

        $pedido = I_pedido::find($validados['IdPedido']);

        $recepcionados = $pedido->detalles->where('CantidadRecibida', '!=', 0);

        //Modificar stock con recepcionados
        foreach ($recepcionados as $recepcionado) {

            $consumible = I_consumible::find($recepcionado->IdConsumible);

            DB::table('i_consumibles')
            ->where('Id', $recepcionado->IdConsumible)
            ->increment('Stock', $recepcionado->CantidadRecibida * $consumible->Equivalencia);

            DB::table('i_detallespedidos')
            ->where([['IdConsumible', $recepcionado->IdConsumible], ['IdPedido', $recepcionado->IdPedido]])
            ->decrement('Cantidad', $recepcionado->CantidadRecibida);
        }


        $recepcion = new I_recepcionpedido();

        $recepcion->IdPedido = $validados['IdPedido'];

        $recepcion->Fecha = Carbon::now();

        //Pasar albarán de recepcionados a través de input file

        $archivo = request()->file('Albaran');

        if ($archivo) {

        $nombre = date('d-m-Y H.i.s', strtotime(Carbon::now())) . 'albaran.pdf';

        $ruta = public_path('documentos/' . $nombre);
        $recepcion->Albaran = '/inventario/public/documentos/' . $nombre;

        if ($archivo) {
            copy($archivo, $ruta);
        }

        $recepcion->Observaciones = $validados['Observaciones'];

        $recepcion->save();
    }

        foreach ($recepcionados as $recepcionado) {
            DB::table('i_detallespedidos')
            ->where('id', $recepcionado->Id)
            ->update(['CantidadRecibida' => 0 ]);
        }

        //Finalizar pedido
        $pedidonuevo = I_pedido::find($validados['IdPedido']);
        $igualesacero = $pedidonuevo->detalles->where('Cantidad', '=', 0)->count();
        $totales = $pedidonuevo->detalles->count();

        if ($igualesacero == $totales) {
            DB::table('i_pedidos')
            ->where('Id', $validados['IdPedido'])
            ->update(['Finalizado' => 1]);
        } else {
            DB::table('i_pedidos')
            ->where('Id', $validados['IdPedido'])
            ->update(['Finalizado' => 0]);
        }

        return redirect()->route('pedidos' ,$pedido->IdPedido)->with('success', 'Recepción realizada con éxito.');

    }


    //Recepciona todos los pedidos
    public function recepciontodos() {

        $validados = $this->validar();

        $pedido = I_pedido::find($validados['IdPedido']);

        $recepcionados = $pedido->detalles->where('Cantidad', '!=', 0);

        //Modificar stock con recepcionados
        foreach ($recepcionados as $recepcionado) {

            $consumible = I_consumible::find($recepcionado->IdConsumible);

            DB::table('i_consumibles')
            ->where('Id', $recepcionado->IdConsumible)
            ->update(['Stock' => $consumible->Stock += $recepcionado->Cantidad * $consumible->Equivalencia]);
        }

        $recepcion = new I_recepcionpedido();

        $recepcion->IdPedido = $validados['IdPedido'];

        $recepcion->Fecha = Carbon::now();

        $recepcion->Observaciones = $validados['Observaciones'];

        $recepcion->save();

        foreach ($recepcionados as $recepcionado) {
            DB::table('i_detallespedidos')
            ->where('id', $recepcionado->Id)
            ->update(['Cantidad' => 0,'CantidadRecibida' => 0 ]);
        }

        //Finalizar pedido
        $pedidonuevo = I_pedido::find($validados['IdPedido']);
        $igualesacero = $pedidonuevo->detalles->where('Cantidad', '=', 0)->count();
        $totales = $pedidonuevo->detalles->count();

        if ($igualesacero == $totales) {
            DB::table('i_pedidos')
            ->where('Id', $validados['IdPedido'])
            ->update(['Finalizado' => 1]);
        } else {
            DB::table('i_pedidos')
            ->where('Id', $validados['IdPedido'])
            ->update(['Finalizado' => 0]);
        }

        return redirect()->route('pedidos' ,$pedido->IdPedido)->with('success', 'Recepción realizada con éxito.');

    }
}
