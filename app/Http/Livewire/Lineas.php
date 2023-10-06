<?php

namespace App\Http\Livewire;

use App\Models\Linea;
use App\Models\RelacionLinea;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Lineas extends Component
{
    public $search /*  = 'Julio Garcia Martín' */;

    /* public function lini($search){

        return $this->lineas->where('FechaBaja', null)->last()->usuario->where('Nombre', 'LIKE', "%$search%")->get(); 
         
     } */

    public function render()
    {
        $ordenes = ['Nombre','Numero', 'Extension'];
        $orden = request()->query('orden') ?: 'Numero';
        abort_unless(in_array($orden, $ordenes), 404);

        
            //$objeto = DB::select('SELECT * from lineas l left join relacionlineas r on l.id = r.IdLinea left join usuarios u on r.IdUsuario = u.id');
            if (request('dir') == 'desc') {
                $objeto = DB::table('lineas')->leftJoin('relacionlineas', 'lineas.id', '=', 'relacionlineas.IdLinea')
                                         ->leftJoin('usuarios', 'relacionlineas.IdUsuario', '=', 'usuarios.id')->select(['lineas.*', 'usuarios.Nombre'])
                                         ->where('relacionlineas.FechaBaja', null)->where('Nombre', 'LIKE', '%'.request('Nombre').'%')
                                         ->where('Numero', 'LIKE', '%'.request('Numero').'%')->where('Extension', 'LIKE', '%'.request('Extension').'%')
                                         ->orderByDesc($orden)->get();
            } else {
                $objeto = DB::table('lineas')->leftJoin('relacionlineas', 'lineas.id', '=', 'relacionlineas.IdLinea')
                                         ->leftJoin('usuarios', 'relacionlineas.IdUsuario', '=', 'usuarios.id')->select(['lineas.*', 'usuarios.Nombre'])
                                         ->where('relacionlineas.FechaBaja', null)->where('Nombre', 'LIKE', '%'.request('Nombre').'%')
                                         ->where('Numero', 'LIKE', '%'.request('Numero').'%')->where('Extension', 'LIKE', '%'.request('Extension').'%')
                                         ->OrderBy($orden)->get();
            }

        return view('livewire.lineas', [
            'objeto' => $objeto,
            'total' => Linea::all()->count(),
        ])->layout('layouts.guest');
    }

    public function render2()
    {
        //$search = 'Practias';

        $ordenes = ['Titular','Numero', 'Extension', 'Pin'];
        $orden = request()->query('orden') ?: 'Numero';
        abort_unless(in_array($orden, $ordenes), 404);

        if (request('dir') == 'desc') {
            $lineas = Linea::OrderByDesc($orden);
        } else {
            //$lineas = Linea::OrderBy($orden)->has('lineas')->where();
            $lineas = Linea::OrderBy($orden);
        }

        $variable = Linea::with('lineas')->get()[2]->lineas();

        $Titular = request('Titular');
        $Numero = request('Numero');
        $Extension = request('Extension');
        $Pin = request('Pin');

        $objeto = $lineas->Numero($Numero)
                        ->Extension($Extension)
                        ->Titular($Titular)
                        ->Pin($Pin)
                        ->paginate(60);

        //$variable = Linea::orderBy('Id')->has('lineas')->get()->last()->lineas()->first()->usuario()->first();
        //$variable = RelacionLinea::with('linea')->with('usuario')->first()->usuario()->first()->Nombre;

        
        return view('livewire.lineas', [
            'objeto' => $objeto,
            'variable' => $variable,
            'total' => Linea::all()->count(),
        ])->layout('layouts.guest');
    }
}