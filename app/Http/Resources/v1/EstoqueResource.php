<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EstoqueResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'produto' => (new DentistaResource($this->produto))->infoProdutoEstoque(),
            'quantidade' => $this ->quantidade,
            'quantidadeMinima' => $this ->quantidadeMinima,
            'updated_at' => $this ->updated_at
        ];
    }
}
