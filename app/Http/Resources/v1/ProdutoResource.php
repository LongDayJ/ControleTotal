<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProdutoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this ->id,
            'nome' => $this ->nome,
        ];
    }
    public function infoProdutoEstoque()
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
        ];
    }
}
