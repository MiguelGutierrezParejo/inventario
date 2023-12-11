<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\I_consumible;
use App\Models\I_detallespedido;
use App\Models\I_pedido;
use App\Models\I_proveedor;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class I_pedidosController extends Controller
{

    public function index($dato = 'Fecha', $orden = 'desc'){

        if ($orden == 'desc') {
            $pedidos = I_pedido::where('Finalizado', 0)->orderByDesc($dato)->get();
        } else {
            $pedidos = I_pedido::where('Finalizado', 0)->orderBy($dato)->get();
        }

        return view('i_pedidos.index', [
            'pedidos' => $pedidos,
        ]);
    }

    public function index2($dato = 'Fecha', $orden = 'desc'){

        if ($orden == 'desc') {
            $pedidos = I_pedido::all()->sortByDesc($dato);
        } else {
            $pedidos = I_pedido::all()->sortBy($dato);
        }

        return view('i_pedidos.index2', [
            'pedidos' => $pedidos,
        ]);
    }

    public function create(Request $request) {

        $pedido = new I_pedido();
        $consumiblesapedir = I_consumible::all()->where('Cantidad', '!=', 0);
        // $proveedor = I_proveedor::all()->whereNull('FechaBaja')->first();
        // $proveedor = I_proveedor::all()->where('Contrato', '=', 'Consumibles')->first();
        $proveedor = I_proveedor::all()->where('Id', '=', $request->get('IdProveedor'))->first();

        //Calcular precio
        $sumatorio = 0;

        foreach ($consumiblesapedir as $consumible) {
            $sumatorio += $consumible->Cantidad * $consumible->Precio;
        }
        //Le resto descuento del proveedor
        $sumatoriomenosdescuento = $sumatorio - ($sumatorio * ($proveedor->Descuento / 100));

        //Le sumo el iva
        $sumatoriocompleto = $sumatoriomenosdescuento + ($sumatoriomenosdescuento * ($proveedor->Iva /100));

        return view('i_pedidos.create', [
            'pedido' => $pedido,
            'consumiblesapedir' => $consumiblesapedir,
            'proveedor' => $proveedor,
            'sumatoriocompleto' => round($sumatoriocompleto, 2),
            'descuento' => $proveedor->Descuento,
            'sumatoriomenosdescuento' => round($sumatoriomenosdescuento, 2),
            'iva' => round($sumatoriomenosdescuento * ($proveedor->Iva /100), 2),

        ]);
    }

    public function store()
    {

        $validados = $this->validar();
        $pedido = new I_pedido();

        $consumiblesapedir = I_consumible::all()->where('Cantidad', '!=', 0);

        $proveedor = I_proveedor::all()->whereNull('FechaBaja')->first();

        //Calcular precio
        $sumatorio = 0;

        foreach ($consumiblesapedir as $consumible) {
            $sumatorio += $consumible->Cantidad * $consumible->Precio;
        }
        //Le resto descuento del proveedor
        $sumatoriomenosdescuento = $sumatorio - ($sumatorio * ($proveedor->Descuento / 100));

        //Le sumo el iva
        $sumatoriocompleto = $sumatoriomenosdescuento + ($sumatoriomenosdescuento * ($proveedor->Iva /100));

        $pedido->IdProveedor = $validados['IdProveedor'];
        $pedido->Fecha = Carbon::now();
        $pedido->importe = $sumatoriocompleto ;

        //Generar pdf valorado
        $consumibles = I_consumible::all()->where('Cantidad', '!=', 0);

        $pdf = Pdf::loadView('i_pedidos.generar', [
            'consumibles' => $consumibles,
            'proveedor' => $proveedor,
            'pedido' => $pedido,
            'sumatoriocompleto' => round($sumatoriocompleto, 2),
            'descuento' => $proveedor->Descuento,
            'sumatoriomenosdescuento' => round($sumatoriomenosdescuento, 2),
            'iva' => round($sumatoriomenosdescuento * ($proveedor->Iva /100), 2),
        ])->setPaper('a4', 'landscape');
        $pdf->render();

        $nombre = date('d-m-Y H.i.s', strtotime(Carbon::now())) ."pedidos.pdf";

        //Ruta a la que se manda el archivo pdf
        $ruta = public_path('documentos/' . $nombre);
        file_put_contents($ruta, $pdf->output());

        $pedido->Documento = '/inventario/public/documentos/' . $nombre;

        //Generar pdf sin valorar
        $pdfsinvalorar = Pdf::loadView('i_pedidos.generarsinvalorar', [
            'consumibles' => $consumibles,
            'proveedor' => $proveedor,
            'pedido' => $pedido,
        ])->setPaper('a4', 'landscape');
        $pdfsinvalorar->render();

        $nombre = date('d-m-Y H.i.s', strtotime(Carbon::now())) ."pedidossinvalorar.pdf";

        //Ruta a la que se manda el archivo pdfsinvalorar
        $ruta = public_path('documentos/' . $nombre);
        file_put_contents($ruta, $pdfsinvalorar->output());

        $pedido->DocumentoSinValorar = '/inventario/public/documentos/' . $nombre;

        $pedido->save();

        //Crear detalles del pedido con los consumibles a pedir (Tabla i_detallespedidos)
        foreach ($consumibles as $consumible ) {

            $detallespedido = new I_detallespedido();

            $detallespedido->IdPedido = $pedido->id;
            $detallespedido->IdConsumible = $consumible->Id;
            $detallespedido->Cantidad = $consumible->Cantidad;

            $detallespedido->save();
        }

        //Cambiar la cantidad de consumibles a pedir a 0 y editado a 0
        foreach ($consumiblesapedir as $consumibleapedir) {
            DB::table('i_consumibles')
            ->where('Id', $consumibleapedir->Id)
            ->update(['Cantidad' => 0, 'Editado' => 0]);
        }

        return redirect('consumibles/')->with('success', 'Pedido creado con éxito.');
    }

    private function validar()
    {
        $validados = request()->validate([

            'IdProveedor' => 'required',
        ]);

        return $validados;
    }

    public function show($id){

        $pedido = I_pedido::find($id);
        $documentos = Documento::where('Tabla', 'Pedido')->where('IdRelacionado', $id)->OrderByDesc('created_at')->get();

        return view('i_pedidos.show', [
            'pedido' => $pedido,
            'documentos' => $documentos,
        ]);
    }

    public function proveedor() {
        $proveedores = DB::table('i_proveedores')->where('Contrato', '=', 'Consumibles')->get();
        return view('i_pedidos.proveedor', ['proveedores' => $proveedores]);
    }
}
