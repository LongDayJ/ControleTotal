<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProntuarioResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'id' => $this ->id,
            'medicamento' => $this ->medicamento,
            'metodo' => $this ->metodo,
            'cuidado' => $this ->cuidado,
            'consulta_id' => $this ->consulta_id
        ];
    }
}
