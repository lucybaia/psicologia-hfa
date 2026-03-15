@extends('layouts.app')
@section('page-title', 'Profissionais')
@section('content')

    @if(session('success'))
        <div class="alert-success"><i class="bi bi-check-circle-fill"></i> {{ session('success') }}</div>
    @endif

    <div class="page-header">
        <h2>Profissionais <span class="badge">{{ $profissionais->total() }}</span></h2>
        <a href="{{ route('profissionais.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Novo Profissional
        </a>
    </div>

    <div class="card">
        <table>
            <thead>
            <tr>
                <th>Nome</th>
                <th>Tipo</th>
                <th>CRP</th>
                <th>Especialidade</th>
                <th>Telefone</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @forelse($profissionais as $profissional)
                <tr>
                    <td>
                        <span class="avatar">{{ strtoupper(substr($profissional->nome, 0, 2)) }}</span>
                        {{ $profissional->nome }}
                    </td>
                    <td>
                        @php
                            $cores = [
                                'psicologo'  => 'background:#dbeafe;color:#1d4ed8',
                                'psiquiatra' => 'background:#f3e8ff;color:#7e22ce',
                            ];
                            $labels = [
                                'psicologo'  => 'Psicólogo',
                                'psiquiatra' => 'Psiquiatra',
                            ];
                        @endphp
                        <span style="padding:3px 10px; border-radius:20px; font-size:0.72rem; font-weight:600;
                        {{ $cores[$profissional->tipo] }}">
                        {{ $labels[$profissional->tipo] }}
                    </span>
                    </td>
                    <td>{{ $profissional->crp }}</td>
                    <td>{{ $profissional->especialidade }}</td>
                    <td>{{ $profissional->telefone }}</td>
                    <td style="display:flex; gap:6px;">
                        <a href="{{ route('profissionais.show', $profissional) }}" class="btn btn-ghost btn-sm">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a href="{{ route('profissionais.edit', $profissional) }}" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('profissionais.destroy', $profissional) }}" method="POST">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Remover profissional?')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align:center; color:var(--muted); padding:40px">
                        Nenhum profissional cadastrado ainda.
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
        <div style="margin-top:16px">{{ $profissionais->links() }}</div>
    </div>

@endsection
