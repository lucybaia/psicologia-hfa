@extends('layouts.app')
@section('page-title', 'Editar Paciente')
@section('content')

    <div class="page-header">
        <h2>Editar — {{ $paciente->nome }}</h2>
        <a href="{{ route('pacientes.index') }}" class="btn btn-ghost">
            <i class="bi bi-arrow-left"></i> Voltar
        </a>
    </div>

    <div class="card">
        <form action="{{ route('pacientes.update', $paciente) }}" method="POST">
            @csrf @method('PUT')
            @include('pacientes._form')
            <div style="display:flex; gap:10px; margin-top:8px">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-lg"></i> Atualizar
                </button>
                <a href="{{ route('pacientes.index') }}" class="btn btn-ghost">Cancelar</a>
            </div>
        </form>
    </div>

@endsection
