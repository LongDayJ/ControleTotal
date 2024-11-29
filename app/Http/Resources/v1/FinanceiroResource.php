<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FinanceiroResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'tipo' => $this ->tipo,
            'valor' => $this ->valor,
            'descricao' => $this ->descricao,
            'data_vencimento' => $this ->data_vencimento,
            'data_pagamento' => $this ->data_pagamento,
            'status' => $this ->status,
            'created_at' => $this ->created_at,
            'updated_at' => $this ->updated_at,
            'deleted_at' => $this ->deleted_at
        ];
    }
}


