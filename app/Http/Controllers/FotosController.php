<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Foto;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FotosController extends Controller
{
    public function create($id)
    {
        $equipo = Equipo::findOrFail($id);
        $foto = new Foto();

        return view('fotoequipos.create', [
            'foto' => $foto,
            'equipo' => $equipo,
        ]);
    }

    public function store($id)
    {
        $equipo = Equipo::findOrFail($id);
        // $validados = $this->validar();
        $foto = new Foto();

        $foto->IdEquipo = $equipo->Id;
        $foto->Foto = request('Foto');
        //$foto->Foto = $validados['Foto'];

        $foto->save();
        
        return redirect('equipos/' . $foto->IdEquipo)->with('success', 'Foto añadida con éxito.');
    }

    /*
    private function validar()
    {
        $validados = request()->validate([
            'Foto' => 'mimes:jpg,jpeg,png,bmp',
        ]);

        return $validados;
    }
    */
}