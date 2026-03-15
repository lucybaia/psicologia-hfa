<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    // Listar todos
    public function index()
    {
        $pacientes = Paciente::latest()->paginate(10);
        return view('pacientes.index', compact('pacientes'));
    }

    // Formulário de criação
    public function create()
    {
        return view('pacientes.create');
    }

    // Salvar novo
    public function store(Request $request)
    {
        $request->validate([
            'nome'            => 'required|string|max:255',
            'email'           => 'required|email|unique:pacientes',
            'telefone'        => 'required|string|max:20',
            'data_nascimento' => 'required|date',
            'cpf'             => 'required|string|unique:pacientes',
        ]);

        Paciente::create($request->all());
        return redirect()->route('pacientes.index')
            ->with('success', 'Paciente cadastrado com sucesso!');
    }

    // Exibir um paciente
    public function show(Paciente $paciente)
    {
        return view('pacientes.show', compact('paciente'));
    }

    // Formulário de edição
    public function edit(Paciente $paciente)
    {
        return view('pacientes.edit', compact('paciente'));
    }

    // Atualizar
    public function update(Request $request, Paciente $paciente)
    {
        $request->validate([
            'nome'            => 'required|string|max:255',
            'email'           => 'required|email|unique:pacientes,email,' . $paciente->id,
            'telefone'        => 'required|string|max:20',
            'data_nascimento' => 'required|date',
            'cpf'             => 'required|string|unique:pacientes,cpf,' . $paciente->id,
        ]);

        $paciente->update($request->all());
        return redirect()->route('pacientes.index')
            ->with('success', 'Paciente atualizado com sucesso!');
    }

    // Deletar
    public function destroy(Paciente $paciente)
    {
        $paciente->delete();
        return redirect()->route('pacientes.index')
            ->with('success', 'Paciente removido com sucesso!');
    }
}
