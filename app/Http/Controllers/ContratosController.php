<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use App\Models\Documento;
use DateTime;
use Illuminate\Support\Facades\DB;

class ContratosController extends Controller
{

    public function index(){

        $contratos = Contrato::all();

        return view('contratos.index', [
            'contratos' => $contratos,
        ]);
    }

    public function show($id){

        $contrato = Contrato::findOrFail($id);
        $documentos = Documento::where('Tabla', 'Contrato')->where('IdRelacionado', $id)->OrderByDesc('created_at')->get();
        $equipos = $contrato->equipos;

        return view('contratos.show', [
            'contrato' => $contrato,
            'documentos' => $documentos,
            'equipos' => $equipos,
        ]);
    }

    public function create()
    {
        $contrato = new Contrato();

        return view('contratos.create', [
            'contrato' => $contrato,
        ]);
    }

    private function validar()
    {

        $validados = request()->validate([
            'Nombre' => 'required',
            'Adjudicatarios' => 'required',
            'NumExpediente' => 'required',
            'Fecha' => 'required|date_format:Y-m-d',
            'Observaciones' => 'nullable|max:255',
            'Estado' => 'required',
        ]);

        return $validados;
    }

    public function store()
    {
        $validados = $this->validar();

        $contrato = new Contrato();

        $contrato->Nombre = $validados['Nombre'];
        $contrato->Adjudicatarios = $validados['Adjudicatarios'];
        $contrato->NumExpediente = $validados['NumExpediente'];
        $contrato->Fecha = new DateTime($validados['Fecha']);
        $contrato->Observaciones = $validados['Observaciones'];
        $contrato->Estado = $validados['Estado'] == '1' ? 1 : 0;

        $contrato->save();

        return redirect('/contratos')->with('success', 'Contrato creado con éxito.');
    }

    public function edit($id)
    {
        $contrato = Contrato::findOrFail($id);

        return view('contratos.edit', [
            'contrato' => $contrato,
        ]);
    }

    public function update($id)
    {
        $validados = $this->validar();
        $contrato = Contrato::findOrFail($id);

        DB::table('contratos')
        ->where('id', $id)
        ->update([
            'Nombre' => $validados['Nombre'],
            'Adjudicatarios' => $validados['Adjudicatarios'],
            'NumExpediente' => $validados['NumExpediente'],
            'Fecha' => date('Y-m-d', strtotime($validados['Fecha'])),
            'Observaciones' => $validados['Observaciones'],
            'Estado' => $validados['Estado'] == '1' ? 1 : 0,
        ]);

        return redirect('contratos/'. $contrato->Id)->with('success', 'Contrato editado con éxito.');
    }
}
