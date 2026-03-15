@extends('layouts.app')
@section('page-title', 'Perfil do Profissional')
@section('content')

    <div class="page-header">
        <h2>{{ $profissional->nome }}</h2>
        <div style="display:flex; gap:8px">
            <a href="{{ route('profissionais.edit', $profissional) }}" class="btn btn-warning">
                <i class="bi bi-pencil"></i> Editar
            </a>
            <a href="{{ route('profissionais.index') }}" class="btn btn-ghost">
                <i class="bi bi-arrow-left"></i> Voltar
            </a>
        </div>
    </div>

    <div class="card">
        <div class="form-grid">
            @foreach([
                ['Tipo',          'bi-person-badge', $profissional->tipo == 'psicologo' ? 'Psicólogo' : 'Psiquiatra'],
                ['Registro',      'bi-card-text',    $profissional->registro],
                ['Especialidade', 'bi-mortarboard',  $profissional->especialidade],
                ['Email',         'bi-envelope',     $profissional->email],
                ['Telefone',      'bi-telephone',    $profissional->telefone],
            ] as [$label, $icon, $valor])
                <div style="padding:16px 0; border-bottom:1px solid var(--border)">
                    <div style="font-size:0.72rem; text-transform:uppercase; letter-spacing:1px; color:var(--muted); margin-bottom:4px">
                        <i class="bi {{ $icon }}"></i> {{ $label }}
                    </div>
                    <div style="font-size:0.95rem; font-weight:500">{{ $valor ?: '—' }}</div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
