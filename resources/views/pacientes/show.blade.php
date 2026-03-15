@extends('layouts.app')
@section('page-title', 'Ficha do Paciente')
@section('content')

    <div class="page-header">
        <h2>{{ $paciente->nome }}</h2>
        <div style="display:flex; gap:8px">
            <a href="{{ route('pacientes.edit', $paciente) }}" class="btn btn-warning">
                <i class="bi bi-pencil"></i> Editar
            </a>
            <a href="{{ route('pacientes.index') }}" class="btn btn-ghost">
                <i class="bi bi-arrow-left"></i> Voltar
            </a>
        </div>
    </div>

    <div class="card">
        <div class="form-grid">
            @foreach([
                ['Email',         'bi-envelope', $paciente->email],
                ['Telefone',      'bi-telephone', $paciente->telefone],
                ['CPF',           'bi-card-text', $paciente->cpf],
                ['Nascimento',    'bi-calendar3', $paciente->data_nascimento],
            ] as [$label, $icon, $valor])
                <div style="padding: 16px 0; border-bottom: 1px solid var(--border)">
                    <div style="font-size:0.72rem; text-transform:uppercase; letter-spacing:1px; color:var(--muted); margin-bottom:4px">
                        <i class="bi {{ $icon }}"></i> {{ $label }}
                    </div>
                    <div style="font-size:0.95rem; font-weight:500">{{ $valor ?: '—' }}</div>
                </div>
            @endforeach
        </div>

        @if($paciente->observacoes)
            <div style="margin-top:20px">
                <div style="font-size:0.72rem; text-transform:uppercase; letter-spacing:1px; color:var(--muted); margin-bottom:8px">
                    <i class="bi bi-journal-text"></i> Observações clínicas
                </div>
                <p style="font-size:0.9rem; line-height:1.7; color:var(--text)">{{ $paciente->observacoes }}</p>
            </div>
        @endif
    </div>

@endsection
