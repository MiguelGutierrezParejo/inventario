<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\S_relacionequipossoftware;
use App\Models\S_relacionusuariossoftware;
use App\Models\S_software;
use Barryvdh\DomPDF\Facade\Pdf;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class S_relacionequipossoftwaresController extends Controller
{

    public function create($id)
    {
        $software = S_software::findOrFail($id);
        $relacionequipossoftware = new S_relacionequipossoftware();

        $equipos = Equipo::all()->sortBy('NombreOrdenador');

        $relaciones = S_relacionequipossoftware::where('IdSoftware', '=', $id)->get();

        //Comprobar los equipos que tengan ya una relacion con dicho software
        $array = [];
        foreach ($relaciones as $relacion) {
            array_push($array, $relacion->IdEquipo);
        }

        $equiposinestar = $equipos->whereNotIn('Id', $array);

        return view('s_relacionequipossoftware.create', [
            'software' => $software,
            'relacionequipossoftware' => $relacionequipossoftware,
            'equipos' => $equiposinestar,
        ]);
    }

    public function store($id, $Origen)
    {
        $validados = $this->validar();

        $relacion = new S_relacionequipossoftware();
        $relacion->IdEquipo = $validados['Equipo'];
        $relacion->IdSoftware = $validados['IdSoftware'];
        $relacion->FechaAlta = $validados['FechaAlta'];
        $relacion->FechaBaja = $validados['FechaBaja']; 
        $relacion->Observaciones = $validados['Observaciones'];
        $relacion->save();

        //Para el redirect
        $id = $validados['IdSoftware'];

        if ($Origen == 'equip') {
            return redirect('equipos/' . $validados['Equipo'])->with('success', 'Software asignado con éxito.');
        } else if ($Origen == 'soft') {
            return redirect('softwares/' . $id)->with('success', 'Software asignado con éxito.');
        }
    }

    private function validar()
    {
        $validados = request()->validate([
            'Equipo' => 'required',
            'IdSoftware' => 'required',
            'FechaAlta' => 'required',
   /*         'FechaBaja' => 'required',
            'Observaciones' => 'required',
     */
    'FechaBaja' => '',
    'Observaciones' => '',
        ]);

        return $validados;
    }

    public function destroy($id)
    {
        $relacion = S_relacionequipossoftware::findOrFail($id);
        
        $relacion->delete();
        
        DB::select('DELETE FROM s_relacionequipossoftwares WHERE Id = ?', [$relacion->Id]);

        return redirect()->back()
        ->with('success', 'Instancia borrada correctamente');
    }

    public function createdesdeequipo($id)
    {

        $equipo = Equipo::findOrFail($id);
        $relacionequipossoftware = new S_relacionequipossoftware();

        $softwares = S_software::all()->where('FechaBaja', '=', null);

        $relaciones = S_relacionequipossoftware::where('IdEquipo', '=', $id)->get();

        //Comprobar los software que tengan ya una relacion con dicho usuario
        $array = [];
        foreach ($relaciones as $relacion) {
            array_push($array, $relacion->IdSoftware);
        }

        $softwaresinestar = $softwares->whereNotIn('Id', $array)->sortBy('Nombre');

        /**Para ver si un software tiene la cantidad maxima de licencias asignadas
        $noterminados = [];
        foreach ($softwaresinestar as $sof) {
            if ($sof->Cantidad > $sof->relaciones->count() + $sof->relacionesequipos->count()){
                array_push($noterminados, $sof->Id);
            }
        }  
        $softwaresinestarnoterminado = $softwaresinestar->whereIn('Id', $noterminados);
        */
        
        return view('s_relacionequipossoftware.createdesdeequipo', [
            'equipo' => $equipo,
            'relacionequipossoftware' => $relacionequipossoftware,
            'softwares' => $softwaresinestar,
        ]);
    }

    
}