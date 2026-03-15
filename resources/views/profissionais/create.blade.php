@extends('layouts.app')
@section('page-title', 'Novo Profissional')
@section('content')

    <div class="page-header">
        <h2>Novo Profissional</h2>
        <a href="{{ route('profissionais.index') }}" class="btn btn-ghost">
            <i class="bi bi-arrow-left"></i> Voltar
        </a>
    </div>

    <div class="card">
        <form action="{{ route('profissionais.store') }}" method="POST">
            @csrf
            @include('profissionais._form')
            <div style="display:flex; gap:10px; margin-top:8px">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-lg"></i> Salvar Profissional
                </button>
                <a href="{{ route('profissionais.index') }}" class="btn btn-ghost">Cancelar</a>
            </div>
        </form>
    </div>

@endsection
