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
        return [
            'nome' => fake()->name(),
            'crp' => fake()->unique()->numerify('##/#####'),
            'especialidade' => fake()->randomElement(['criança', 'adulto', 'idoso']),
            'email' => fake()->unique()->safeEmail(),
            'telefone' => fake()->phoneNumber(),
            'tipo' => fake()->randomElement(['psicologo', 'psiquiatra']),
        ];
    }
}
