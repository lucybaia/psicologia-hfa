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
            --hover-bg:    #f3f4f6;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: #f0f2f5;
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
            box-shadow: 4px 0 24px rgba(0,0,0,0.08);
        }

        .sidebar-brand {
            padding: 28px 24px 20px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .sidebar-brand h1 {
            font-family: 'DM Sans', sans-serif;
            font-size: 1.15rem;
            font-weight: 700;
            color: #fff;
            line-height: 1.3;
            letter-spacing: -0.3px;
        }

        .sidebar-brand span {
            font-size: 0.65rem;
            color: rgba(255,255,255,0.5);
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: 400;
            display: block;
            margin-top: 4px;
        }

        .sidebar nav { padding: 16px 12px; flex: 1; }

        .nav-label {
            font-size: 0.6rem;
            text-transform: uppercase;
            letter-spacing: 2.5px;
            color: rgba(255,255,255,0.35);
            padding: 14px 12px 8px;
            font-weight: 600;
        }

        .sidebar nav a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            border-radius: 8px;
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 400;
            transition: all 0.15s;
            margin-bottom: 2px;
        }

        .sidebar nav a:hover {
            background: rgba(255,255,255,0.1);
            color: #fff;
        }

        .sidebar nav a.active {
            background: rgba(255,255,255,0.15);
            color: #fff;
            font-weight: 500;
        }

        .sidebar nav a i {
            font-size: 1rem;
            width: 18px;
            text-align: center;
        }

        .sidebar-footer {
            padding: 16px 24px;
            border-top: 1px solid rgba(255,255,255,0.1);
            font-size: 0.7rem;
            color: rgba(255,255,255,0.3);
            letter-spacing: 0.5px;
        }

        /* ── MAIN ── */
        .main {
            margin-left: var(--sidebar-w);
            flex: 1;
            display: flex;
            flex-direction: column;
            width: calc(100% - var(--sidebar-w));
            min-height: 100vh;
        }

        .topbar {
            background: var(--white);
            border-bottom: 1px solid var(--border);
            padding: 0 32px;
            height: 56px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 50;
            box-shadow: 0 1px 3px rgba(0,0,0,0.04);
        }

        .topbar-title {
            font-size: 0.95rem;
            font-weight: 600;
            color: var(--text);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .topbar-title::before {
            content: '';
            display: inline-block;
            width: 3px;
            height: 16px;
            background: var(--verde);
            border-radius: 2px;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .topbar-tag {
            font-size: 0.72rem;
            color: var(--muted);
            background: var(--hover-bg);
            padding: 4px 10px;
            border-radius: 20px;
            border: 1px solid var(--border);
        }

        .content { padding: 28px 32px; }

        /* ── CARDS ── */
        .card {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.04);
        }

        /* ── ALERTS ── */
        .alert-success {
            background: #ecfdf5;
            border: 1px solid #a7f3d0;
            color: #065f46;
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* ── TABLE ── */
        table { width: 100%; border-collapse: collapse; }

        thead th {
            font-size: 0.68rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: var(--muted);
            font-weight: 600;
            padding: 10px 16px;
            border-bottom: 1px solid var(--border);
            text-align: left;
            background: #fafafa;
        }

        thead th:first-child { border-radius: 8px 0 0 0; }
        thead th:last-child  { border-radius: 0 8px 0 0; }

        tbody td {
            padding: 13px 16px;
            font-size: 0.875rem;
            border-bottom: 1px solid var(--border);
            color: var(--text);
            vertical-align: middle;
        }

        tbody tr:last-child td { border-bottom: none; }
        tbody tr { transition: background 0.12s; }
        tbody tr:hover { background: var(--verde-bg); }

        /* ── BUTTONS ── */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 14px;
            border-radius: 7px;
            font-size: 0.8rem;
            font-weight: 500;
            font-family: 'DM Sans', sans-serif;
            border: none;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.15s;
            white-space: nowrap;
        }

        .btn-primary         { background: var(--verde); color: #fff; }
        .btn-primary:hover   { background: #235c42; color: #fff; }
        .btn-warning         { background: #fef3c7; color: var(--warning); border: 1px solid #fde68a; }
        .btn-warning:hover   { background: #fde68a; }
        .btn-danger          { background: #fee2e2; color: var(--danger); border: 1px solid #fecaca; }
        .btn-danger:hover    { background: #fecaca; }
        .btn-ghost           { background: transparent; color: var(--muted); border: 1px solid var(--border); }
        .btn-ghost:hover     { background: var(--hover-bg); color: var(--text); }
        .btn-sm              { padding: 5px 10px; font-size: 0.75rem; border-radius: 6px; }

        /* ── FORMS ── */
        .form-group { margin-bottom: 18px; }

        label.form-label {
            display: block;
            font-size: 0.78rem;
            font-weight: 600;
            color: var(--text);
            margin-bottom: 6px;
            letter-spacing: 0.2px;
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
            transition: border 0.15s, box-shadow 0.15s;
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
            margin-bottom: 20px;
        }

        .page-header h2 {
            font-size: 1.35rem;
            font-weight: 700;
            letter-spacing: -0.3px;
        }

        .badge {
            background: var(--verde-bg);
            color: var(--verde);
            font-size: 0.68rem;
            padding: 3px 9px;
            border-radius: 20px;
            font-weight: 600;
            margin-left: 8px;
            border: 1px solid #b7e4c7;
        }

        .avatar {
            width: 32px; height: 32px;
            background: var(--verde-bg);
            color: var(--verde);
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.72rem;
            margin-right: 10px;
            border: 1px solid #b7e4c7;
            flex-shrink: 0;
        }

        /* ── PAGINATION ── */
        nav[role="navigation"] {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 20px;
            padding-top: 16px;
            border-top: 1px solid var(--border);
        }

        nav[role="navigation"] > div:first-child {
            display: none;
        }

        nav[role="navigation"] > div.hidden.sm\:flex-1.sm\:flex.sm\:items-center.sm\:justify-between {
            display: flex !important;
            width: 100%;
            align-items: center;
        }

        nav[role="navigation"] p {
            font-size: 0.8rem;
            color: var(--muted);
            margin: 0;
        }

        nav[role="navigation"] p span {
            font-weight: 600;
            color: var(--text);
        }

        nav[role="navigation"] span.relative.z-0.inline-flex.shadow-sm.rounded-md {
            box-shadow: none;
            gap: 4px;
            align-items: center;
        }

        nav[role="navigation"] a.relative.inline-flex.items-center,
        nav[role="navigation"] span.relative.inline-flex.items-center {
            width: 32px;
            height: 32px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 7px;
            border: 1px solid var(--border);
            background: var(--white);
            color: var(--muted);
            font-size: 0.8rem;
            text-decoration: none;
            transition: all 0.15s;
            padding: 0;
        }

        nav[role="navigation"] a.relative.inline-flex.items-center:hover {
            background: var(--hover-bg);
            color: var(--text);
            border-color: #d1d5db;
        }

        nav[role="navigation"] svg {
            width: 13px;
            height: 13px;
        }

        nav[role="navigation"] a.relative.inline-flex.items-center.px-4.py-2 {
            width: 32px;
            height: 32px;
            padding: 0;
            border: 1px solid var(--border);
            border-radius: 7px;
            color: var(--muted);
            font-size: 0.82rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.15s;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        nav[role="navigation"] a.relative.inline-flex.items-center.px-4.py-2:hover {
            background: var(--hover-bg);
            color: var(--text);
            border-color: #d1d5db;
        }

        nav[role="navigation"] span[aria-current="page"] > span {
            width: 32px;
            height: 32px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 1px solid var(--verde);
            border-radius: 7px;
            background: var(--verde);
            color: var(--white);
            font-size: 0.82rem;
            font-weight: 600;
            padding: 0;
        }

        nav[role="navigation"] span.relative.inline-flex.items-center.px-4.py-2.text-sm.font-medium.text-gray-700.bg-white {
            border: none;
            background: transparent;
            color: var(--muted);
            width: auto;
            padding: 0 4px;
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
        <a href="{{ route('dashboard') }}"
           class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="bi bi-grid"></i> Painel
        </a>
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
    <div class="sidebar-footer">v1.0 &mdash; Sistema Interno</div>
</aside>

<div class="main">
    <div class="topbar">
        <span class="topbar-title">@yield('page-title', 'Painel')</span>
        <div class="topbar-right">
            <span class="topbar-tag"><i class="bi bi-circle-fill" style="color:#22c55e;font-size:0.5rem"></i> Online</span>
            <span class="topbar-tag">Psicologia HFA</span>
        </div>
    </div>

    <div class="content">
        @yield('content')
    </div>
</div>

<script>
    function mascaraCPF(input) {
        input.addEventListener('input', function () {
            let v = this.value.replace(/\D/g, '').slice(0, 11);
            v = v.replace(/(\d{3})(\d)/, '$1.$2');
            v = v.replace(/(\d{3})(\d)/, '$1.$2');
            v = v.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
            this.value = v;
        });
    }

    function mascaraCRP(input) {
        input.addEventListener('input', function () {
            let v = this.value.replace(/\D/g, '').slice(0, 8);
            v = v.replace(/(\d{2})(\d)/, '$1/$2');
            this.value = v;
        });
    }

    function mascaraTelefone(input) {
        input.addEventListener('input', function () {
            let v = this.value.replace(/\D/g, '').slice(0, 11);
            v = v.replace(/(\d{2})(\d)/, '($1) $2');
            v = v.replace(/(\d{5})(\d{4})$/, '$1-$2');
            this.value = v;
        });
    }

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
