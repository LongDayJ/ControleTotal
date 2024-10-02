<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProcedimentoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'nome' => $this ->nome,
            'descricao' => $this ->descricao,
            'preco' => $this ->preco,
            'id_procedimento_pai' => $this ->id_procedimento_pai
        ];
    }
    public function infoProcedimentoAgendamento()
    {
        return [
            'nome' => $this ->nome,            
            'preco' => $this ->preco,
        ];
    }

}
