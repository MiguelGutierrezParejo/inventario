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

    public function store(Request $request, $id)
    {
        $equipo = Equipo::findOrFail($id);

        // Verificar si se ha enviado un archivo
        if ($request->hasFile('Foto')) {
            $fotoFile = $request->file('Foto');

            // Generar una ruta única para almacenar la imagen
            $rutaImagen = $fotoFile->store('fotoequipos', 'custom');

            // Almacenar la ruta en la base de datos
            $foto = new Foto();
            $foto->IdEquipo = $equipo->Id;
            $foto->Foto = $rutaImagen;
            $foto->save();
        }

        return redirect('equipos/' . $equipo->Id)->with('success', 'Foto añadida con éxito.');
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