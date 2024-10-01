<?php

namespace Database\Factories;

use App\Models\Procedimento;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Procedimento>
 */
class ProcedimentoFactory extends Factory
{
    protected $model = Procedimento::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->word(),  // Gera um nome aleatório para o procedimento
            'descricao' => $this->faker->sentence(),  // Gera uma descrição aleatória
            'codigo_procedimento' => $this->faker->unique()->numerify('PROC###'),  // Código único, como 'PROC123'
            'id_procedimento_pai' => null,  // Procedimentos sem pai por padrão (pode ser setado posteriormente)
        ];
    }

    // Se você quiser criar subprocedimentos, pode usar este estado customizado
    public function comPai(Procedimento $pai)
    {
        return $this->state(function () use ($pai) {
            return [
                'id_procedimento_pai' => $pai->id,
            ];
        });
    }
}
