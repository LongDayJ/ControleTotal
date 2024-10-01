<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dentista>
 */
class DentistaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->name(),
            'descricao' => $this->faker->sentence(),
            'status' => 'ativo',
            'cro' => $this->faker->numerify('CRO######'),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
