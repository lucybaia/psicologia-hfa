@extends('layouts.app')
@section('page-title', 'Painel')
@section('content')

    {{-- Cards de resumo --}}
    <div style="display:grid; grid-template-columns: repeat(3, 1fr); gap:16px; margin-bottom:28px;">

        <a href="{{ route('pacientes.index') }}" style="text-decoration:none">
            <div class="card" style="display:flex; align-items:center; gap:16px;"
                 onmouseover="this.style.boxShadow='0 4px 16px rgba(0,0,0,0.08)'"
                 onmouseout="this.style.boxShadow='0 1px 3px rgba(0,0,0,0.04)'">
                <div style="width:48px;height:48px;background:var(--verde-bg);border-radius:12px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                    <i class="bi bi-people" style="font-size:1.4rem;color:var(--verde)"></i>
                </div>
                <div>
                    <div style="font-size:0.72rem;text-transform:uppercase;letter-spacing:1.5px;color:var(--muted);font-weight:600;">Pacientes</div>
                    <div style="font-size:1.8rem;font-weight:700;color:var(--text);line-height:1.2;">{{ $totalPacientes }}</div>
                </div>
            </div>
        </a>

        <a href="{{ route('consultas.index') }}" style="text-decoration:none">
            <div class="card" style="display:flex; align-items:center; gap:16px;"
                 onmouseover="this.style.boxShadow='0 4px 16px rgba(0,0,0,0.08)'"
                 onmouseout="this.style.boxShadow='0 1px 3px rgba(0,0,0,0.04)'">
                <div style="width:48px;height:48px;background:#eff6ff;border-radius:12px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                    <i class="bi bi-calendar3" style="font-size:1.4rem;color:#1d4ed8"></i>
                </div>
                <div>
                    <div style="font-size:0.72rem;text-transform:uppercase;letter-spacing:1.5px;color:var(--muted);font-weight:600;">Consultas</div>
                    <div style="font-size:1.8rem;font-weight:700;color:var(--text);line-height:1.2;">{{ $totalConsultas }}</div>
                </div>
            </div>
        </a>

        <a href="{{ route('profissionais.index') }}" style="text-decoration:none">
            <div class="card" style="display:flex; align-items:center; gap:16px;"
                 onmouseover="this.style.boxShadow='0 4px 16px rgba(0,0,0,0.08)'"
                 onmouseout="this.style.boxShadow='0 1px 3px rgba(0,0,0,0.04)'">
                <div style="width:48px;height:48px;background:#f5f3ff;border-radius:12px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                    <i class="bi bi-person-badge" style="font-size:1.4rem;color:#7e22ce"></i>
                </div>
                <div>
                    <div style="font-size:0.72rem;text-transform:uppercase;letter-spacing:1.5px;color:var(--muted);font-weight:600;">Profissionais</div>
                    <div style="font-size:1.8rem;font-weight:700;color:var(--text);line-height:1.2;">{{ $totalProfissionais }}</div>
                </div>
            </div>
        </a>

    </div>

    {{-- Duas tabelas lado a lado --}}
    <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:16px;">

        {{-- Recentes --}}
        <div class="card">
            <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:20px;">
                <h3 style="font-size:0.95rem; font-weight:600;">
                    <i class="bi bi-clock-history" style="color:var(--muted); margin-right:6px"></i>
                    Consultas Recentes
                </h3>
            </div>
            <table>
                <thead>
                <tr><th>Paciente</th><th>Profissional</th><th>Data</th><th>Ação</th></tr>
                </thead>
                <tbody>
                @forelse($consultasRecentes as $consulta)
                    <tr>
                        <td>
                            <span class="avatar">{{ strtoupper(substr($consulta->paciente->nome, 0, 2)) }}</span>
                            {{ $consulta->paciente->nome }}
                        </td>
                        <td>{{ $consulta->profissional->nome ?? '—' }}</td>
                        <td>{{ \Carbon\Carbon::parse($consulta->data)->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('consultas.show', $consulta) }}" class="btn btn-ghost btn-sm" title="Ver detalhes">
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" style="text-align:center;color:var(--muted);padding:24px">Nenhuma consulta.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>

        {{-- Próximas --}}
        <div class="card">
            <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:20px;">
                <h3 style="font-size:0.95rem; font-weight:600;">
                    <i class="bi bi-calendar-check" style="color:#1d4ed8; margin-right:6px"></i>
                    Próximas Consultas
                </h3>
                <a href="{{ route('consultas.create') }}" class="btn btn-primary btn-sm">
                    <i class="bi bi-plus-lg"></i> Nova
                </a>
            </div>
            <table>
                <thead>
                <tr><th>Paciente</th><th>Profissional</th><th>Data</th><th>Ação</th></tr>
                </thead>
                <tbody>
                @forelse($consultasProximas as $consulta)
                    <tr>
                        <td>
                            <span class="avatar">{{ strtoupper(substr($consulta->paciente->nome, 0, 2)) }}</span>
                            {{ $consulta->paciente->nome }}
                        </td>
                        <td>{{ $consulta->profissional->nome ?? '—' }}</td>
                        <td>{{ \Carbon\Carbon::parse($consulta->data)->format('d/m/Y') }}<br><small class="text-muted">{{ $consulta->hora }}</small></td>
                        <td>
                            <a href="{{ route('consultas.show', $consulta) }}" class="btn btn-ghost btn-sm" title="Ver detalhes">
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" style="text-align:center;color:var(--muted);padding:24px">Nenhuma agendada.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>

    </div>

    {{-- Canceladas --}}
    <div class="card">
        <div style="margin-bottom:20px;">
            <h3 style="font-size:0.95rem; font-weight:600;">
                <i class="bi bi-x-circle" style="color:var(--danger); margin-right:6px"></i>
                Consultas Canceladas
            </h3>
        </div>
        <table>
            <thead>
            <tr><th>Paciente</th><th>Profissional</th><th>Data</th><th>Hora</th><th>Ação</th></tr>
            </thead>
            <tbody>
            @forelse($consultasCanceladas as $consulta)
                <tr>
                    <td>
                        <span class="avatar">{{ strtoupper(substr($consulta->paciente->nome, 0, 2)) }}</span>
                        {{ $consulta->paciente->nome }}
                    </td>
                    <td>{{ $consulta->profissional->nome ?? '—' }}</td>
                    <td>{{ \Carbon\Carbon::parse($consulta->data)->format('d/m/Y') }}</td>
                    <td>{{ $consulta->hora }}</td>
                    <td>
                        <a href="{{ route('consultas.show', $consulta) }}" class="btn btn-ghost btn-sm" title="Ver detalhes">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" style="text-align:center;color:var(--muted);padding:24px">Nenhuma cancelada.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>

@endsection
