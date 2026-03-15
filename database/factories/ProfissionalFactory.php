<?php

namespace Database\Factories;

use App\Models\Profissional;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profissional>
 */
class ProfissionalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Profissional::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tipo = fake()->randomElement(['psicologo', 'psiquiatra']);

        if ($tipo === 'psiquiatra') {
            $uf = fake()->randomElement(['SP', 'RJ', 'MG', 'DF', 'BA', 'PR']);
            $registro = fake()->unique()->numerify("CRM/{$uf} ######");
        } else {
            $registro = fake()->unique()->numerify('##/######');
        }

        return [
            'nome' => fake()->name(),
            'registro' => $registro,
            'especialidade' => fake()->randomElement(['criança', 'adulto', 'idoso']),
            'email' => fake()->unique()->safeEmail(),
            'telefone' => fake()->phoneNumber(),
            'tipo' => $tipo,
        ];
    }
}
