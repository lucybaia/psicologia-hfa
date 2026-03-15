<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Paciente;
use App\Models\Profissional;
use App\Http\Requests\ConsultaRequest;

class ConsultaController extends Controller
{
    public function index()
    {
        $consultas = Consulta::with(['paciente', 'profissional'])
            ->orderBy('data', 'desc')
            ->orderBy('hora', 'desc')
            ->paginate(10);

        return view('consultas.index', compact('consultas'));
    }

    public function create()
    {
        $pacientes     = Paciente::orderBy('nome')->get();
        $profissionais = Profissional::orderBy('nome')->get();
        return view('consultas.create', compact('pacientes', 'profissionais'));
    }

    public function store(ConsultaRequest $request)
    {
        Consulta::create($request->all());
        return redirect()->route('consultas.index')
            ->with('success', 'Consulta agendada com sucesso!');
    }

    public function show(Consulta $consulta)
    {
        $consulta->load(['paciente', 'profissional']);
        return view('consultas.show', compact('consulta'));
    }

    public function edit(Consulta $consulta)
    {
        $pacientes     = Paciente::orderBy('nome')->get();
        $profissionais = Profissional::orderBy('nome')->get();
        return view('consultas.edit', compact('consulta', 'pacientes', 'profissionais'));
    }

    public function update(ConsultaRequest $request, Consulta $consulta)
    {
        $consulta->update($request->all());
        return redirect()->route('consultas.index')
            ->with('success', 'Consulta atualizada com sucesso!');
    }

    public function destroy(Consulta $consulta)
    {
        $consulta->delete();
        return redirect()->route('consultas.index')
            ->with('success', 'Consulta removida com sucesso!');
    }
}
