<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\Consulta;
use App\Models\Profissional;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPacientes     = Paciente::count();
        $totalConsultas     = Consulta::count();
        $totalProfissionais = Profissional::count();

        $consultasRecentes = Consulta::with(['paciente', 'profissional'])
            ->where('status', 'realizada')
            ->orderBy('data', 'desc')
            ->orderBy('hora', 'desc')
            ->take(5)
            ->get();

        $consultasProximas = Consulta::with(['paciente', 'profissional'])
            ->where('status', 'agendada')
            ->where('data', '>=', today())
            ->orderBy('data', 'asc')
            ->orderBy('hora', 'asc')
            ->take(5)
            ->get();

        $consultasCanceladas = Consulta::with(['paciente', 'profissional'])
            ->where('status', 'cancelada')
            ->orderBy('data', 'desc')
            ->orderBy('hora', 'desc')
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalPacientes',
            'totalConsultas',
            'totalProfissionais',
            'consultasRecentes',
            'consultasProximas',
            'consultasCanceladas'
        ));
    }
}
