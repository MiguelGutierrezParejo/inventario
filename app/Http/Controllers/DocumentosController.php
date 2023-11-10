<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class DocumentosController extends Controller
{
    public function create($table, $id)
    {
        $documento = new Documento;

        $documento->Tabla = $table;
        $documento->IdRelacionado = $id;

        //Para determinar el botón Volver

        if ($documento->Tabla == 'Empleado'){
            $tipo = 'usuarios';
        } elseif ($documento->Tabla == 'Software') {
            $tipo = 'softwares';
        } elseif ($documento->Tabla == 'Proveedor') {
            $tipo = 'proveedores';
        } elseif ($documento->Tabla == 'Impresora') {
            $tipo = 'impresoras';
        } elseif ($documento->Tabla == 'Terminal') {
            $tipo = 'terminales';
        } elseif ($documento->Tabla == 'Contrato') {
            $tipo = 'contratos';
        } else {
            $tipo = 'equipos';
        }

        return view('documentos.create', [
            'documento' => $documento,
            'tipo' => $tipo,
        ]);
    }

    public function store($table, $id)
    {
        $validados = $this->validar();
        $documento = new Documento;
        $documento->Nombre = $validados['Nombre'];
        $documento->Tabla = $table;
        $documento->IdRelacionado = $id;
        $documento->Observaciones = $validados['Observaciones'];

        $documento->save();
        $archivo = request()->file('Documento');

        $nombre = $table . '_'. $documento->id . '.pdf';

        $ruta = public_path('documentos/' . $nombre);
        $documento->Fichero = '/inventario/public/documentos/' . $nombre;

        $documento->save();

        copy($archivo, $ruta);

        if ($documento->Tabla == 'Empleado') {
            return redirect('/usuarios/'.$documento->IdRelacionado)->with('success', 'Información actualizada.');
        } else if ($documento->Tabla == 'Software') {
            return redirect('/softwares/'.$documento->IdRelacionado)->with('success', 'Información actualizada.');
        } else if ($documento->Tabla == 'Impresora') {
            return redirect('/impresoras/'.$documento->IdRelacionado)->with('success', 'Información actualizada.');
        } else if ($documento->Tabla == 'Terminal') {
            return redirect('/terminales/'.$documento->IdRelacionado)->with('success', 'Información actualizada.');
        } else if ($documento->Tabla == 'Contrato'){
            return redirect('/contratos/'.$documento->IdRelacionado)->with('success', 'Información actualizada.');
        }

        return redirect('/equipos/'.$documento->IdRelacionado)->with('success', 'Información actualizada.');
    }

    public function edit($id)
    {
        $documento = Documento::findOrFail($id);
        $tipo = ($documento->Tabla == 'Empleado') ? 'usuarios' : 'equipos' ;    //Para determinar el botón Volver

        return view('documentos.edit', [
            'documento' => $documento,
            'tipo' => $tipo,
        ]);
    }

    public function update($id)
    {
        $validados = $this->validar();

        $documento = Documento::findOrFail($id);

        $documento->Nombre = $validados['Nombre'];
        $documento->Observaciones = $validados['Observaciones'];

        if (request()->hasFile('Documento')) {
            // Verifica si ya existe un archivo PDF
            $rutaArchivoAntiguo = public_path($documento->Fichero);

            if (File::exists($rutaArchivoAntiguo)) {
                // Elimina el archivo PDF existente
                File::delete($rutaArchivoAntiguo);
            }

            // Procesar el nuevo fichero PDF
            $nuevoArchivo = request()->file('Documento');
            $nombreArchivo = $documento->Tabla . '_' . $documento->Id . '.pdf';

            // Guardar el nuevo fichero
            $nuevoArchivo->move(public_path('documentos'), $nombreArchivo);
            $documento->Fichero = 'documentos/' . $nombreArchivo;
        }

        $documento->save();

        DB::select('UPDATE documentos SET Nombre = ?, Observaciones = ?
                    WHERE id = ?', [$validados['Nombre'], $validados['Observaciones'], $id]);

        if ($documento->Tabla == 'Empleado') {
            return redirect('/usuarios/'.$documento->IdRelacionado)->with('success', 'Información actualizada.');
        } else if ($documento->Tabla == 'Software') {
            return redirect('/softwares/'.$documento->IdRelacionado)->with('success', 'Información actualizada.');
        } else if ($documento->Tabla == 'Impresora') {
            return redirect('/impresoras/'.$documento->IdRelacionado)->with('success', 'Información actualizada.');
        } else if ($documento->Tabla == 'Terminal') {
            return redirect('/terminales/'.$documento->IdRelacionado)->with('success', 'Información actualizada.');
        } else if ($documento->Tabla == 'Contrato'){
            return redirect('/contratos/'.$documento->IdRelacionado)->with('success', 'Información actualizada.');
        }

        return redirect('/equipos/'.$documento->IdRelacionado)->with('success', 'Información actualizada.');

    }

    private function validar()
    {
        $validados = request()->validate([
            'Nombre' => 'required|max:255',
            'Documento' => 'nullable|mimes:pdf',
            'Observaciones' => 'nullable|max:255',
        ]);

        return $validados;
    }

    public function destroy($id)
    {
        $documento = Documento::findOrFail($id);

        // Obtener la ruta del archivo físico
        $rutaArchivo = public_path('documentos/' . $documento->Tabla . '_' . $documento->Id . '.pdf');

        // Verificar si el archivo existe antes de intentar eliminarlo
        if (file_exists($rutaArchivo)) {
            // Eliminar el archivo físico
            unlink($rutaArchivo);
        }

        DB::select('DELETE FROM documentos WHERE id = ?', [$documento->Id]);

        return redirect()->back()->with('success', 'Documento eliminado correctamente');
    }
}
