<?php

namespace App\Http\Controllers;

use App\Models\Modelo;
use App\Models\Foto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FotosController extends Controller
{
    public function create($id)
    {
        $modelo = Modelo::findOrFail($id);
        $foto = new Foto();

        return view('fotoequipos.create', [
            'foto' => $foto,
            'modelo' => $modelo,
        ]);
    }

    public function store(Request $request, $id)
    {
        $modelo = Modelo::findOrFail($id);

        // Verificar si se ha enviado un archivo
        if ($request->hasFile('Foto')) {
            $fotoFile = $request->file('Foto');

            // Obtener el siguiente número de orden
            $orden = $modelo->fotos()->count() + 1;
            // Generar una ruta única para almacenar la imagen
            $rutaImagen = $fotoFile->store('', 'custom');

            // Almacenar la ruta en la base de datos
            $foto = new Foto();
            $foto->IdModelo = $modelo->Id;
            $foto->Foto = $rutaImagen;
            $foto->orden = $orden; // Asignar el número de orden
            $foto->save();
        }

        return redirect("/modelos/$modelo->Id")->with('success', 'Foto añadida con éxito.');
    }

    private function validar()
    {

        $validados = request()->validate([
            'Orden' => 'required',
        ]);

        return $validados;
    }

    public function edit($id)
    {
        $foto = Foto::findOrFail($id);
        $modelo = Modelo::findOrFail($foto->IdModelo);

        return view('fotoequipos.edit', compact('foto', 'modelo'));
    }

    public function update($id)
    {
        $validados = $this->validar();
        $foto = Foto::findOrFail($id);

        DB::table('fotos')
        ->where('id', $id)
        ->update([
            'Orden' => $validados['Orden']
        ]);

        return redirect("/modelos/$foto->IdModelo")->with('success', 'Orden de la foto actualizado con éxito.');
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
