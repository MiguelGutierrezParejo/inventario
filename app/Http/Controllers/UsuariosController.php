<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\Relacionequipo;
use App\Models\RelacionLinea;
use App\Models\Relaciontelefono;
use App\Models\RelacionTerminal;
use App\Models\Usuario;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuariosController extends Controller
{
    public function index()
    {
        $ordenes = ['Nombre', 'Departamento', 'FechaAlta', 'FechaBaja'];
        $orden = request()->query('orden') ?: 'Nombre'; 
        abort_unless(in_array($orden, $ordenes), 404);

        if (request('dir') == 'desc') {
            $usuarios = Usuario::OrderByDesc($orden);
        } else {
            $usuarios = Usuario::OrderBy($orden);
        }

        $Nombre = request('Nombre');
        $Departamento = request('Departamento');
        $FechaAlta = request('FechaAlta');
        $FechaBaja = request('FechaBaja');

        $objeto = $usuarios->Nombre($Nombre)
                        ->Departamento($Departamento)
                        ->FechaAlta($FechaAlta)
                        ->FechaBaja($FechaBaja)
                        ->paginate(60);    
        
        return view('usuarios.index', [
            'objeto' => $objeto,
            'total' => Usuario::all()->count(),
        ]);
    }

    public function show($id){

        $usuario= Usuario::all()->firstWhere('Id', $id);
        $equipo = Relacionequipo::all()->where('IdUsuario', $id)->whereNull('FechaBaja')->first();
        $terminales = RelacionTerminal::all()->where('IdUsuario', $id)->whereNull('FechaBaja');
        $linea = RelacionLinea::all()->where('IdUsuario', $id)->whereNull('FechaBaja')->first();
        $relacionpc = Relacionequipo::OrderByDesc('FechaAlta')->where('IdUsuario', $id)->get();
        $relaciontlf = RelacionTerminal::OrderByDesc('FechaAlta')->where('IdUsuario', $id)->get();
        $relacionum = RelacionLinea::OrderByDesc('FechaAlta')->where('IdUsuario', $id)->get();
        $documentos = Documento::where('Tabla', 'Empleado')->where('IdRelacionado', $id)->get();

        return view('usuarios.show', [
            'usuario' => $usuario,
            'equipo' => $equipo,
            'terminales' => $terminales,
            'linea' => $linea,
            'relaciontlf' => $relaciontlf,
            'relacionpc' => $relacionpc,
            'relacionum' => $relacionum,
            'documentos' => $documentos,
        ]);
    }

    public function create()
    {
        $usuario = new Usuario();
        return view('usuarios.create', [
            'usuario' => $usuario,
        ]);
    }

    public function store()
    {
        $validados = $this->validar();

        $usuario = new Usuario();
        $usuario->Nombre = $validados['Nombre'];
        $usuario->Departamento = $validados['Departamento'];
        $usuario->Usuario = $validados['Usuario'];
        $usuario->FechaAlta = new DateTime($validados['FechaAlta']);
        if ($validados['FechaBaja']) {
            $usuario->FechaBaja = new DateTime($validados['FechaAlta']);
            }
        $usuario->Observaciones = $validados['Observaciones'];
        $usuario->save();
        
        return redirect('/usuarios')->with('success', 'Usuario creado con éxito.');
    }


    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        
        return view('usuarios.edit', [
            'usuario' => $usuario,

        ]);
    }

    public function update($id)
    {
        $validados = $this->validar();
        $usuario = Usuario::findOrFail($id);
 
        $FechaAlta = new DateTime($validados['FechaAlta']);
        $FechaBaja = null;
        if ($validados['FechaBaja']) {
            $FechaBaja = new DateTime($validados['FechaBaja']);
        }

        DB::select('UPDATE usuarios SET Nombre = ?, Usuario = ?, Departamento = ?, FechaAlta = ?, FechaBaja = ?, Observaciones = ? 
                                 WHERE id = ?', [$validados['Nombre'], $validados['Usuario'], $validados['Departamento'], $FechaAlta, $FechaBaja, $validados['Observaciones'], $id]);

        return redirect('/usuarios/'.$usuario->Id)->with('success', 'Usuario actualizado.');
    }

    private function validar()
    {
        $validados = request()->validate([
            'Nombre' => 'required|max:255',
            'Usuario' => 'required',
            'Departamento' => 'required|max:255',
            'FechaAlta' => 'required|date_format:Y-m-d',
            'FechaBaja' => 'nullable|date_format:Y-m-d',
            'Observaciones' => 'nullable|max:255',
        ]);

        return $validados;
    }

}
