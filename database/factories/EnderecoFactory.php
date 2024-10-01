<?php

namespace Database\Factories;

use App\Models\Endereco;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Endereco>
 */
class EnderecoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'uf' => $this->faker->stateAbbr(), // Gera um estado aleatório (abreviação)
            'cidade' => $this->faker->city(),  // Gera uma cidade aleatória
            'bairro' => $this->faker->streetName(), // Gera um nome de bairro
            'logradouro' => $this->faker->address(), // Gera um endereço aleatório
            'telefone' => $this->faker->phoneNumber(), // Gera um número de telefone
            'cep' => $this->faker->postcode(), // Gera um CEP aleatório
            'numeroCasa' => $this->faker->buildingNumber(), // Gera um número de casa
            'complemento' => $this->faker->secondaryAddress(), // Gera um complemento aleatório
            'user_id' => User::factory(),
        ];
    }
}
