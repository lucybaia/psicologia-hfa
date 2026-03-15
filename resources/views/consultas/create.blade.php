@extends('layouts.app')
@section('page-title', 'Nova Consulta')
@section('content')

    <div class="page-header">
        <h2>Nova Consulta</h2>
        <a href="{{ route('consultas.index') }}" class="btn btn-ghost">
            <i class="bi bi-arrow-left"></i> Voltar
        </a>
    </div>

    <div class="card">
        <form action="{{ route('consultas.store') }}" method="POST">
            @csrf
            @include('consultas._form')
            <div style="display:flex; gap:10px; margin-top:8px">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-lg"></i> Agendar Consulta
                </button>
                <a href="{{ route('consultas.index') }}" class="btn btn-ghost">Cancelar</a>
            </div>
        </form>
    </div>

@endsection
