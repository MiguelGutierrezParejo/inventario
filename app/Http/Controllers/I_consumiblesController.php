<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\I_consumible;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class I_consumiblesController extends Controller
{
    public function index($dato = 'Id', $orden = 'asc'){

        $consumibles = I_consumible::all();

        foreach ($consumibles as $consumible) { 

            //Para comprobar si hay stock pendiente por llegar
            $porrecibir = 0;
            if ($consumible->detalles->count() == 0 ){
                $porrecibir = 0;
            } else {
                foreach ($consumible->detalles as $detalle) {
                    $porrecibir += $detalle->Cantidad * $consumible->Equivalencia;
                }
            }

            if ($consumible->Stock + $porrecibir < $consumible->Stockminimo and $consumible->Editado == 0) {
                DB::table('i_consumibles')
                ->where('id', $consumible->Id)
                ->update(['Cantidad' => $consumible->Stockminimo - $consumible->Stock]);
            } elseif( $consumible->Stock + $porrecibir >= $consumible->Stockminimo and $consumible->Editado == 0) {
                DB::table('i_consumibles')
                ->where('id', $consumible->Id)
                ->update(['Cantidad' => 0]);
            }
        }

        if ($orden == 'desc') {
            $consumibles = I_consumible::all()->where('Bajas', 0)->sortByDesc($dato);
        } else {
            $consumibles = I_consumible::all()->where('Bajas', 0)->sortBy($dato);
        }

        $total = I_consumible::all()->count();
        
        return view('i_consumibles.index', [
            'consumibles' => $consumibles,
            'total' => $total,
 
        ]);
    }

    public function create()
    {
        $consumible = new I_consumible();

        return view('i_consumibles.create', [
            'consumible' => $consumible,
        ]);
    }

    public function store()
    {
        $validados = $this->validar();

        $consumible = new I_consumible();

        $consumible->Modelo = $validados['Modelo'];
        $consumible->Referencia = $validados['Referencia'];
        $consumible->Paginas = $validados['Paginas'];
        $consumible->Precio = $validados['Precio'];
        $consumible->Stock = $validados['Stock'];
        $consumible->Bajas = $validados['Bajas'];
        $consumible->Equivalencia = $validados['Equivalencia'];
        $consumible->Stockminimo = $validados['Stockminimo'];
        $consumible->Observaciones = $validados['Observaciones'];

        $consumible->save();

        return redirect('/consumibles')->with('success', 'Consumible creado con éxito.');
    }

    public function edit($id)
    {
        $consumible = I_consumible::findOrFail($id);

        return view('i_consumibles.edit', [
            'consumible' => $consumible,
        ]);
    }

    private function validar()
    {

        $validados = request()->validate([
            'Modelo' => 'required',
            'Referencia' => 'required',
            'Paginas' => 'nullable',
            'Precio' => 'required',
            'Stock' => 'required',
            'Bajas' => 'nullable',
            'Equivalencia' => 'required',
            'Stockminimo' => 'required',
            'Observaciones' => 'nullable',
        ]);

        return $validados;
    }

    public function show($id){
        $consumible = I_consumible::all()->firstWhere('Id', $id);

        return view('i_consumibles.show', [
            'consumible' => $consumible,
        ]);
    }


    public function update(Request $request, $id) {

        $validados = $this->validar();
        $consumible = I_consumible::findOrFail($id);

        DB::table('i_consumibles')
        ->where('id', $id)
        ->update(['Modelo' => $validados['Modelo'], 'Referencia' => $validados['Referencia'], 'Paginas' => $validados['Paginas'],
        'Precio' => $validados['Precio'], 'Stock' => $validados['Stock'], 'Bajas' => $validados['Bajas'], 'Equivalencia' => $validados['Equivalencia'],
        'Stockminimo' => $validados['Stockminimo'], 'Observaciones' => $validados['Observaciones']]);

        return redirect('/consumibles/'.$consumible->Id)->with('success', 'Consumible actualizado.');

    } 

    public function generar()
    {
        $consumibles = I_consumible::all();

        $pdf = Pdf::loadView('i_consumibles.generar', [
                'consumibles' => $consumibles,
        ])->setPaper('a4', 'landscape');
        return $pdf->stream(); 
    }

    public function editarconsumible() 
    {

        if ($_COOKIE['cantidad'] < 0) {
            return redirect('consumibles/')->with('error', 'La cantidad no puede ser menor que 0.');
        }

        $cantidad = $_COOKIE['cantidad'];

        $id = $_COOKIE['id'];

        DB::table('i_consumibles')
        ->where('id', $id)
        ->update(['Cantidad' => $cantidad, 'Editado' => 1]);

        return redirect('consumibles/')->with('success', 'Cantidad añadida con éxito.');
        
    }

    public function editarstock() 
    {

        if ($_COOKIE['stock'] < 0) {
            return redirect('consumibles/')->with('error', 'El stock no puede ser menor que 0.');
        }

        $stock = $_COOKIE['stock'];

        $id = $_COOKIE['id'];

        DB::table('i_consumibles')
        ->where('id', $id)
        ->update(['Stock' => $stock]);

        return redirect('consumibles/')->with('success', 'Stock añadido con éxito');
    }


}
