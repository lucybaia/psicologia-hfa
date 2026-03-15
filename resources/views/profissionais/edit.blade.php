@extends('layouts.app')
@section('page-title', 'Editar Profissional')
@section('content')

    <div class="page-header">
        <h2>Editar — {{ $profissional->nome }}</h2>
        <a href="{{ route('profissionais.index') }}" class="btn btn-ghost">
            <i class="bi bi-arrow-left"></i> Voltar
        </a>
    </div>

    <div class="card">
        <form action="{{ route('profissionais.update', $profissional) }}" method="POST">
            @csrf @method('PUT')
            @include('profissionais._form')
            <div style="display:flex; gap:10px; margin-top:8px">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-lg"></i> Atualizar
                </button>
                <a href="{{ route('profissionais.index') }}" class="btn btn-ghost">Cancelar</a>
            </div>
        </form>
    </div>

@endsection
