<?php

namespace App\Http\Controllers;

use App\Models\Profissional;
use App\Http\Requests\ProfissionalRequest;

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

    public function store(ProfissionalRequest $request)
    {
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

    public function update(ProfissionalRequest $request, Profissional $profissional)
    {
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
