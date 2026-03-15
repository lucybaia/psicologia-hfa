<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Psicologia HFA</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --verde:       #2d6a4f;
            --verde-claro: #52b788;
            --verde-bg:    #f0faf4;
            --sidebar-w:   240px;
            --text:        #1a1a2e;
            --muted:       #6b7280;
            --border:      #e5e7eb;
            --white:       #ffffff;
            --danger:      #dc2626;
            --warning:     #d97706;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: #f7f9fb;
            color: var(--text);
            display: flex;
            min-height: 100vh;
        }

        /* ── SIDEBAR ── */
        .sidebar {
            width: var(--sidebar-w);
            background: var(--verde);
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0; left: 0; bottom: 0;
            z-index: 100;
        }

        .sidebar-brand {
            padding: 28px 24px 20px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .sidebar-brand h1 {
            font-family: 'DM Sans', sans-serif;
            font-size: 1.25rem;
            font-weight: 700;
            color: #fff;
            line-height: 1.2;
        }

        .sidebar-brand span {
            font-size: 0.7rem;
            color: rgba(255,255,255,0.55);
            text-transform: uppercase;
            letter-spacing: 1.5px;
            font-weight: 300;
        }

        .sidebar nav { padding: 16px 12px; flex: 1; }

        .nav-label {
            font-size: 0.65rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: rgba(255,255,255,0.4);
            padding: 12px 12px 6px;
            font-weight: 500;
        }

        .sidebar nav a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            border-radius: 8px;
            color: rgba(255,255,255,0.75);
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 400;
            transition: all 0.18s;
            margin-bottom: 2px;
        }

        .sidebar nav a:hover,
        .sidebar nav a.active {
            background: rgba(255,255,255,0.12);
            color: #fff;
        }

        .sidebar nav a i { font-size: 1rem; }

        /* ── MAIN ── */
        .main {
            margin-left: var(--sidebar-w);
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .topbar {
            background: var(--white);
            border-bottom: 1px solid var(--border);
            padding: 14px 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .topbar-title {
            font-family: 'DM Sans', sans-serif;
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--text);
        }

        .content { padding: 32px; }

        /* ── CARDS ── */
        .card {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 1px 4px rgba(0,0,0,0.04);
        }

        /* ── ALERTS ── */
        .alert-success {
            background: #ecfdf5;
            border: 1px solid #a7f3d0;
            color: #065f46;
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 0.875rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* ── TABLE ── */
        table { width: 100%; border-collapse: collapse; }

        thead th {
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: var(--muted);
            font-weight: 600;
            padding: 10px 16px;
            border-bottom: 1px solid var(--border);
            text-align: left;
        }

        tbody td {
            padding: 14px 16px;
            font-size: 0.875rem;
            border-bottom: 1px solid var(--border);
            color: var(--text);
        }

        tbody tr:last-child td { border-bottom: none; }
        tbody tr:hover { background: var(--verde-bg); }

        /* ── BUTTONS ── */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 16px;
            border-radius: 7px;
            font-size: 0.8rem;
            font-weight: 500;
            font-family: 'DM Sans', sans-serif;
            border: none;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.18s;
        }

        .btn-primary         { background: var(--verde); color: #fff; }
        .btn-primary:hover   { background: #235c42; color: #fff; }
        .btn-warning         { background: #fef3c7; color: var(--warning); border: 1px solid #fde68a; }
        .btn-warning:hover   { background: #fde68a; }
        .btn-danger          { background: #fee2e2; color: var(--danger); border: 1px solid #fecaca; }
        .btn-danger:hover    { background: #fecaca; }
        .btn-ghost           { background: transparent; color: var(--muted); border: 1px solid var(--border); }
        .btn-ghost:hover     { background: var(--border); }
        .btn-sm              { padding: 5px 10px; font-size: 0.75rem; }

        /* ── FORMS ── */
        .form-group { margin-bottom: 18px; }

        label.form-label {
            display: block;
            font-size: 0.8rem;
            font-weight: 500;
            color: var(--text);
            margin-bottom: 6px;
        }

        .form-control {
            width: 100%;
            padding: 9px 12px;
            border: 1px solid var(--border);
            border-radius: 7px;
            font-size: 0.875rem;
            font-family: 'DM Sans', sans-serif;
            color: var(--text);
            background: var(--white);
            transition: border 0.18s, box-shadow 0.18s;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--verde-claro);
            box-shadow: 0 0 0 3px rgba(82,183,136,0.15);
        }

        .form-control.is-invalid { border-color: var(--danger); }
        .invalid-feedback { color: var(--danger); font-size: 0.78rem; margin-top: 4px; }

        .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 0 20px; }

        /* ── PAGE HEADER ── */
        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
        }

        .page-header h2 {
            font-family: 'DM Sans', sans-serif;
            font-size: 1.4rem;
            font-weight: 700;
        }

        .badge {
            background: var(--verde-bg);
            color: var(--verde);
            font-size: 0.7rem;
            padding: 3px 10px;
            border-radius: 20px;
            font-weight: 600;
            margin-left: 10px;
        }

        .avatar {
            width: 34px; height: 34px;
            background: var(--verde-bg);
            color: var(--verde);
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 0.8rem;
            margin-right: 10px;
        }
    </style>
</head>
<body>

<aside class="sidebar">
    <div class="sidebar-brand">
        <h1>Psicologia HFA</h1>
        <span>Clínica & Saúde Mental</span>
    </div>
    <nav>
        <div class="nav-label">Menu</div>
        <a href="{{ route('pacientes.index') }}"
           class="{{ request()->routeIs('pacientes.*') ? 'active' : '' }}">
            <i class="bi bi-people"></i> Pacientes
        </a>
        <a href="{{ route('consultas.index') }}"
           class="{{ request()->routeIs('consultas.*') ? 'active' : '' }}">
            <i class="bi bi-calendar3"></i> Consultas
        </a>
        <a href="{{ route('profissionais.index') }}"
           class="{{ request()->routeIs('profissionais.*') ? 'active' : '' }}">
            <i class="bi bi-person-badge"></i> Profissionais
        </a>
    </nav>
</aside>

<div class="main">
    <div class="topbar">
        <span class="topbar-title">@yield('page-title', 'Painel')</span>
        <span style="font-size:0.8rem; color:var(--muted)">Psicologia HFA &mdash; Sistema Interno</span>
    </div>

    <div class="content">
        @yield('content')
    </div>
</div>

<script>
    // ── MÁSCARA CPF: 000.000.000-00
    function mascaraCPF(input) {
        input.addEventListener('input', function () {
            let v = this.value.replace(/\D/g, '').slice(0, 11);
            v = v.replace(/(\d{3})(\d)/, '$1.$2');
            v = v.replace(/(\d{3})(\d)/, '$1.$2');
            v = v.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
            this.value = v;
        });
    }

    // ── MÁSCARA CRP: 00/000000
    function mascaraCRP(input) {
        input.addEventListener('input', function () {
            let v = this.value.replace(/\D/g, '').slice(0, 8);
            v = v.replace(/(\d{2})(\d)/, '$1/$2');
            this.value = v;
        });
    }

    // ── MÁSCARA TELEFONE: (00) 00000-0000
    function mascaraTelefone(input) {
        input.addEventListener('input', function () {
            let v = this.value.replace(/\D/g, '').slice(0, 11);
            v = v.replace(/(\d{2})(\d)/, '($1) $2');
            v = v.replace(/(\d{5})(\d{4})$/, '$1-$2');
            this.value = v;
        });
    }

    // ── SÓ LETRAS (nome)
    function soLetras(input) {
        input.addEventListener('input', function () {
            this.value = this.value.replace(/[^a-zA-ZÀ-ÿ\s]/g, '');
        });
    }

    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('input[name="cpf"]').forEach(mascaraCPF);
        document.querySelectorAll('input[name="crp"]').forEach(mascaraCRP);
        document.querySelectorAll('input[name="telefone"]').forEach(mascaraTelefone);
        document.querySelectorAll('input[name="nome"]').forEach(soLetras);
    });
</script>

</body>
</html>
