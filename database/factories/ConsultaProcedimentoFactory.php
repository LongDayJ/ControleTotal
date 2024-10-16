<?php

namespace Database\Factories;

use App\Models\ConsultaProcedimento;
use App\Models\Consulta;
use App\Models\Procedimento;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConsultaProcedimentoFactory extends Factory
{
    protected $model = ConsultaProcedimento::class;

    public function definition()
    {
        return [
            'consulta_id' => Consulta::factory(), // Cria uma nova consulta se não houver
            'procedimento_id' => Procedimento::factory(), // Cria um novo procedimento se não houver
            'preco' => $this->faker->randomFloat(2, 50, 500), // Preço entre 50 e 500 com 2 casas decimais
        ];
    }
}
