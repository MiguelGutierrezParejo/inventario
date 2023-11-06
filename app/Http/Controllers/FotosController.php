<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Foto;
use Illuminate\Http\Request;

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
            $rutaImagen = $fotoFile->store('', 'custom');

            // Almacenar la ruta en la base de datos
            $foto = new Foto();
            $foto->IdEquipo = $equipo->Id;
            $foto->Foto = $rutaImagen;
            $foto->save();
        }

        return redirect("/equipos/$equipo->Id")->with('success', 'Foto añadida con éxito.');
    }

    public function destroy($fotoId)
    {
        $foto = Foto::find($fotoId);
        $fotoFilePath = public_path('storage/' . basename($foto->Foto));

        // Elimina el archivo del sistema
        if (file_exists($fotoFilePath)) {
            unlink($fotoFilePath);
        }

        // Elimina el registro de la base de datos
        Foto::where('Id', $fotoId)->delete();

        if ($foto->delete()) {
            return redirect()->back()->with('success', 'Imagen eliminada con éxito.');
        } else {
            return redirect()->back()->with('error', 'No se pudo eliminar la imagen.');
        }
    }
}
