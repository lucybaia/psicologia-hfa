@extends('layouts.app')
@section('page-title', 'Consultas')
@section('content')

    @if(session('success'))
        <div class="alert-success"><i class="bi bi-check-circle-fill"></i> {{ session('success') }}</div>
    @endif

    <div class="page-header">
        <h2>Consultas <span class="badge">{{ $consultas->total() }}</span></h2>
        <a href="{{ route('consultas.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Nova Consulta
        </a>
    </div>

    <div class="card">
        <table>
            <thead>
            <tr>
                <th>Paciente</th>
                <th>Data</th>
                <th>Hora</th>
                <th>Duração</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @forelse($consultas as $consulta)
                <tr>
                    <td>{{ $consulta->paciente->nome }}</td>
                    <td>{{ \Carbon\Carbon::parse($consulta->data)->format('d/m/Y') }}</td>
                    <td>{{ $consulta->hora }}</td>
                    <td>{{ $consulta->duracao }} min</td>
                    <td>
                        @php
                            $cores = [
                                'agendada'  => 'background:#dbeafe;color:#1d4ed8',
                                'realizada' => 'background:#dcfce7;color:#166534',
                                'cancelada' => 'background:#fee2e2;color:#991b1b',
                            ];
                        @endphp
                        <span style="padding:3px 10px; border-radius:20px; font-size:0.72rem; font-weight:600;
                        {{ $cores[$consulta->status] }}">
                        {{ ucfirst($consulta->status) }}
                    </span>
                    </td>
                    <td style="display:flex; gap:6px;">
                        <a href="{{ route('consultas.show', $consulta) }}" class="btn btn-ghost btn-sm">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a href="{{ route('consultas.edit', $consulta) }}" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('consultas.destroy', $consulta) }}" method="POST">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Remover consulta?')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align:center; color:var(--muted); padding:40px">
                        Nenhuma consulta cadastrada ainda.
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
        <div style="margin-top:16px">{{ $consultas->links() }}</div>
    </div>

@endsection
