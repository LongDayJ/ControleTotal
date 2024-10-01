<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Agendamento>
 */
class AgendamentoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'data' => $this->faker->date(),
            'hora' => $this->faker->time(),
            'status' => $this->faker->randomElement(['AGENDADO', 'CONCLUIDO', 'CANCELADO']),
            'observacao' => $this->faker->text(),
            'user_id' => \App\Models\User::factory(),
            'dentista_id' => \App\Models\Dentista::factory(),
            
        ];
    }
}
