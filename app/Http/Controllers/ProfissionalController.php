<?php

namespace App\Http\Controllers;

use App\Models\Profissional;
use Illuminate\Http\Request;

class ProfissionalController extends Controller
{
    public function index()
    {
        $profissionais = Profissional::latest()->paginate(10);
        return view('profissionais.index', compact('profissionais'));
    }

    public function create()
    {
        return view('profissionais.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome'          => 'required|string|max:255',
            'crp'           => 'required|string|unique:profissionais',
            'especialidade' => 'required|string|max:255',
            'email'         => 'required|email|unique:profissionais',
            'telefone'      => 'required|string|max:20',
            'tipo'          => 'required|in:psicologo,psiquiatra',
        ]);

        Profissional::create($request->all());
        return redirect()->route('profissionais.index')
            ->with('success', 'Profissional cadastrado com sucesso!');
    }

    public function show(Profissional $profissional)
    {
        return view('profissionais.show', compact('profissional'));
    }

    public function edit(Profissional $profissional)
    {
        return view('profissionais.edit', compact('profissional'));
    }

    public function update(Request $request, Profissional $profissional)
    {
        $request->validate([
            'nome'          => 'required|string|max:255',
            'crp'           => 'required|string|unique:profissionais,crp,' . $profissional->id,
            'especialidade' => 'required|string|max:255',
            'email'         => 'required|email|unique:profissionais,email,' . $profissional->id,
            'telefone'      => 'required|string|max:20',
            'tipo'          => 'required|in:psicologo,psiquiatra',
        ]);

        $profissional->update($request->all());
        return redirect()->route('profissionais.index')
            ->with('success', 'Profissional atualizado com sucesso!');
    }

    public function destroy(Profissional $profissional)
    {
        $profissional->delete();
        return redirect()->route('profissionais.index')
            ->with('success', 'Profissional removido com sucesso!');
    }
}
