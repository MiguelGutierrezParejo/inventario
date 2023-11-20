<?php

namespace App\Http\Controllers;

use App\Models\I_modeloimpresora;
use App\Models\Fotoimpresora;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FotosimpresoraController extends Controller
{
    public function create($id)
    {
        $modelo = I_modeloimpresora::findOrFail($id);
        $foto = new Fotoimpresora();

        return view('fotoimpresoras.create', [
            'foto' => $foto,
            'modelo' => $modelo,
        ]);
    }

    public function store(Request $request, $id)
    {
        $modelo = I_modeloimpresora::findOrFail($id);

        // Verificar si se ha enviado un archivo
        if ($request->hasFile('Foto')) {
            $fotoFile = $request->file('Foto');

            // Obtener el siguiente número de orden
            $orden = $modelo->fotos()->count() + 1;
            // Generar una ruta única para almacenar la imagen
            $rutaImagen = $fotoFile->store('', 'custom');

            // Almacenar la ruta en la base de datos
            $foto = new Fotoimpresora();
            $foto->IdModelo = $modelo->Id;
            $foto->Foto = $rutaImagen;
            $foto->orden = $orden; // Asignar el número de orden
            $foto->save();
        }

        return redirect("/modeloimpresoras/$modelo->Id")->with('success', 'Foto añadida con éxito.');
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
        $foto = Fotoimpresora::findOrFail($id);
        $modelo = I_modeloimpresora::findOrFail($foto->IdModelo);

        return view('fotoimpresoras.edit', compact('foto', 'modelo'));
    }

    public function update($id)
    {
        $validados = $this->validar();
        $foto = Fotoimpresora::findOrFail($id);

        DB::table('fotosimpresoras')
        ->where('id', $id)
        ->update([
            'Orden' => $validados['Orden']
        ]);

        return redirect("/modeloimpresoras/$foto->IdModelo")->with('success', 'Orden de la foto actualizado con éxito.');
    }

    public function destroy($id)
    {
        $foto = Fotoimpresora::find($id);
        $fotoFilePath = public_path('storage/' . basename($foto->Foto));

        // Elimina el archivo del sistema
        if (file_exists($fotoFilePath)) {
            unlink($fotoFilePath);
        }

        // Elimina el registro de la base de datos
        Fotoimpresora::where('Id', $id)->delete();

        if ($foto->delete()) {
            return redirect()->back()->with('success', 'Imagen eliminada con éxito.');
        } else {
            return redirect()->back()->with('error', 'No se pudo eliminar la imagen.');
        }
    }
}
