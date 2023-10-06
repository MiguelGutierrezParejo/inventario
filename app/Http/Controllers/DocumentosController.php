<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use Illuminate\Support\Facades\DB;

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
        }

        return redirect('/equipos/'.$documento->IdRelacionado)->with('success', 'Información actualizada.');
        
    }

    private function validar()
    {
        $validados = request()->validate([           
            'Nombre' => 'required|max:255',
            'Documento' => 'mimes:pdf',
            'Observaciones' => 'nullable|max:255',
        ]);

        return $validados;
    }

    public function destroy($id)
    {
        $documento = Documento::findOrFail($id);

        unlink('/var/www/html' . $documento->Fichero);
        
        DB::select('DELETE FROM documentos WHERE id = ?', [$documento->Id]);

        return redirect()->back()->with('success', 'Documento eliminado correctamente');
    }



}
