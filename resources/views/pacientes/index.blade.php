@extends('layouts.app')
@section('page-title', 'Pacientes')
@section('content')

    @if(session('success'))
        <div class="alert-success"><i class="bi bi-check-circle-fill"></i> {{ session('success') }}</div>
    @endif

    <div class="page-header">
        <div>
            <h2>Pacientes <span class="badge">{{ $pacientes->total() }}</span></h2>
        </div>
        <a href="{{ route('pacientes.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Novo Paciente
        </a>
    </div>

    <div class="card">
        <table>
            <thead>
            <tr>
                <th>Paciente</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>CPF</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @forelse($pacientes as $paciente)
                <tr>
                    <td>
                        <span class="avatar">{{ strtoupper(substr($paciente->nome, 0, 2)) }}</span>
                        {{ $paciente->nome }}
                    </td>
                    <td>{{ $paciente->email }}</td>
                    <td>{{ $paciente->telefone }}</td>
                    <td>{{ $paciente->cpf }}</td>
                    <td style="display:flex; gap:6px;">
                        <a href="{{ route('pacientes.show', $paciente) }}" class="btn btn-ghost btn-sm">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a href="{{ route('pacientes.edit', $paciente) }}" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('pacientes.destroy', $paciente) }}" method="POST">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Remover paciente?')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align:center; color:var(--muted); padding:40px">
                        Nenhum paciente cadastrado ainda.
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
        <div style="margin-top:16px">{{ $pacientes->links() }}</div>
    </div>

@endsection
