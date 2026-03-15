<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Paciente;
use App\Models\Profissional;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    public function index()
    {
        $consultas = Consulta::with(['paciente', 'profissional'])->latest()->paginate(10);
        return view('consultas.index', compact('consultas'));
    }

    public function create()
    {
        $pacientes     = Paciente::orderBy('nome')->get();
        $profissionais = Profissional::orderBy('nome')->get();
        return view('consultas.create', compact('pacientes', 'profissionais'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'paciente_id'     => 'required|exists:pacientes,id',
            'profissional_id' => 'nullable|exists:profissionais,id',
            'data'            => 'required|date',
            'hora'            => 'required',
            'duracao'         => 'required|integer|min:10',
            'status'          => 'required|in:agendada,realizada,cancelada',
            'anotacoes'       => 'nullable|string',
        ]);

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

    public function update(Request $request, Consulta $consulta)
    {
        $request->validate([
            'paciente_id'     => 'required|exists:pacientes,id',
            'profissional_id' => 'nullable|exists:profissionais,id',
            'data'            => 'required|date',
            'hora'            => 'required',
            'duracao'         => 'required|integer|min:10',
            'status'          => 'required|in:agendada,realizada,cancelada',
            'anotacoes'       => 'nullable|string',
        ]);

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
