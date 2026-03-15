<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Paciente;
use App\Models\Profissional;
use App\Models\Consulta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class  DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Criando pacientes e profissionais e guardando em variáveis
        $pacientes = Paciente::factory(50)->create();
        $profissionais = Profissional::factory(15)->create();

        // Criando 20 consultas fictícias
        // Atribuindo pacientes e profissionais aleatórios que acabaram de ser criados
        for ($i = 0; $i < 80; $i++) {
            Consulta::factory()->create([
                'paciente_id' => $pacientes->random()->id,
                'profissional_id' => $profissionais->random()->id,
            ]);
        }
    }
}
