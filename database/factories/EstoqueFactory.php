<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Estoque>
 */
class EstoqueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'quantidade' => $this->faker->numerify('###'),
            'quantidadeMinima' =>$this->faker->numerify('#'),
            'produto_id/' => \App\Models\Produto::factory(),
        ];
    }
}
