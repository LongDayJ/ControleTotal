<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AgendamentoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'id' => $this->id,
            'data' => $this->data,
            'hora' => $this->hora,
            'status' => $this->status,
            'user' => (new UserResource($this->user))->infoUserAgendamento(),
            'dentista' => (new DentistaResource($this->dentista))->infoDentistaAgendamento(),
            'procedimento' => (new ProcedimentoResource($this->procedimento))->infoProcedimentoAgendamento()
              ];
        }
}

