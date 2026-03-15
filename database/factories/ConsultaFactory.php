<?php

namespace Database\Factories;

use App\Models\Consulta;
use App\Models\Paciente;
use App\Models\Profissional;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConsultaFactory extends Factory
{
    protected $model = Consulta::class;

    public function definition(): array
    {
        // Primeiro, decidimos o status
        $status = $this->faker->randomElement(['agendada', 'realizada', 'cancelada']);

        $dataHora = null;

        switch ($status) {
            case 'agendada':
                // Apenas datas e horas futuras
                $dataHora = $this->faker->dateTimeBetween('now', '+2 months');
                break;
            case 'realizada':
                // Apenas datas e horas passadas
                $dataHora = $this->faker->dateTimeBetween('-2 months', 'now');
                break;
            case 'cancelada':
                // Pode ser no passado ou no futuro
                $dataHora = $this->faker->dateTimeBetween('-1 month', '+1 month');
                break;
        }

        return [
            'paciente_id' => Paciente::factory(),
            'profissional_id' => Profissional::factory(),
            'data' => $dataHora->format('Y-m-d'),
            'hora' => $dataHora->format('H:i:s'),
            'duracao' => $this->faker->randomElement([30, 45, 60]),
            'status' => $status,
            'anotacoes' => $this->faker->optional()->paragraph(),
        ];
    }
}
