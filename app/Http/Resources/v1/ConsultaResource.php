<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ConsultaResource extends JsonResource
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
            'diagnostico' => $this->diagnostic,
            'codigoConsulta' =>$this->codigoConsulta,
            'agendamento_id' =>$this->agendamento_id
        ];
    }
}
