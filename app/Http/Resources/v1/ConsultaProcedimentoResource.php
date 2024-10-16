<?php

namespace App\Http\Resources;

use App\Http\Resources\v1\ConsultaResource;
use App\Http\Resources\v1\ProcedimentoResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ConsultaProcedimentoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'consulta_id' => $this->consulta_id,
            'procedimento_id' => $this->procedimento_id,
            'preco' => $this->preco,
            'consulta' => new ConsultaResource($this->consulta),
            'procedimento' => new ProcedimentoResource($this->procediemnto)
        ];
    }
}
