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
            'quantidade' => $this ->quantidade,
            'quantidadeMinima' => $this ->quantidadeMinima,
            'update_at' => $this ->update_at,
            'produto' => (new DentistaResource($this->produto))->infoProdutoEstoque()
        ];
    }
}
