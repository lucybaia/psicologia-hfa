<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Http\Requests\PacienteRequest;

class PacienteController extends Controller
{
    public function index()
    {
        $pacientes = Paciente::latest()->paginate(10);
        return view('pacientes.index', compact('pacientes'));
    }

    public function create()
    {
        return view('pacientes.create');
    }

    public function store(PacienteRequest $request)
    {
        Paciente::create($request->all());
        return redirect()->route('pacientes.index')
            ->with('success', 'Paciente cadastrado com sucesso!');
    }

    public function show(Paciente $paciente)
    {
        return view('pacientes.show', compact('paciente'));
    }

    public function edit(Paciente $paciente)
    {
        return view('pacientes.edit', compact('paciente'));
    }

    public function update(PacienteRequest $request, Paciente $paciente)
    {
        $paciente->update($request->all());
        return redirect()->route('pacientes.index')
            ->with('success', 'Paciente atualizado com sucesso!');
    }

    public function destroy(Paciente $paciente)
    {
        $paciente->delete();
        return redirect()->route('pacientes.index')
            ->with('success', 'Paciente removido com sucesso!');
    }
}
