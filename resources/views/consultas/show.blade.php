@extends('layouts.app')
@section('page-title', 'Detalhes da Consulta')
@section('content')

    <div class="page-header">
        <h2>Consulta — {{ $consulta->paciente->nome }}</h2>
        <div style="display:flex; gap:8px">
            <a href="{{ route('consultas.edit', $consulta) }}" class="btn btn-warning">
                <i class="bi bi-pencil"></i> Editar
            </a>
            <a href="{{ route('consultas.index') }}" class="btn btn-ghost">
                <i class="bi bi-arrow-left"></i> Voltar
            </a>
        </div>
    </div>

    <div class="card">
        <div class="form-grid">
            @foreach([
                ['Paciente',  'bi-person',    $consulta->paciente->nome],
                ['Data',      'bi-calendar3', \Carbon\Carbon::parse($consulta->data)->format('d/m/Y')],
                ['Hora',      'bi-clock',     $consulta->hora],
                ['Duração',   'bi-hourglass', $consulta->duracao . ' minutos'],
                ['Status',    'bi-circle',    ucfirst($consulta->status)],
            ] as [$label, $icon, $valor])
                <div style="padding:16px 0; border-bottom:1px solid var(--border)">
                    <div style="font-size:0.72rem; text-transform:uppercase; letter-spacing:1px; color:var(--muted); margin-bottom:4px">
                        <i class="bi {{ $icon }}"></i> {{ $label }}
                    </div>
                    <div style="font-size:0.95rem; font-weight:500">{{ $valor ?: '—' }}</div>
                </div>
            @endforeach
        </div>

        @if($consulta->anotacoes)
            <div style="margin-top:20px">
                <div style="font-size:0.72rem; text-transform:uppercase; letter-spacing:1px; color:var(--muted); margin-bottom:8px">
                    <i class="bi bi-journal-text"></i> Anotações
                </div>
                <p style="font-size:0.9rem; line-height:1.7">{{ $consulta->anotacoes }}</p>
            </div>
        @endif
    </div>

@endsection
