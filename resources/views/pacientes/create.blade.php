@extends('layouts.app')
@section('page-title', 'Novo Paciente')
@section('content')

    <div class="page-header">
        <h2>Novo Paciente</h2>
        <a href="{{ route('pacientes.index') }}" class="btn btn-ghost">
            <i class="bi bi-arrow-left"></i> Voltar
        </a>
    </div>

    <div class="card">
        <form action="{{ route('pacientes.store') }}" method="POST">
            @csrf
            @include('pacientes._form')
            <div style="display:flex; gap:10px; margin-top:8px">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-lg"></i> Salvar Paciente
                </button>
                <a href="{{ route('pacientes.index') }}" class="btn btn-ghost">Cancelar</a>
            </div>
        </form>
    </div>

@endsection
