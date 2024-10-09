<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EnderecoResource extends JsonResource
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
            'uf' => $this ->uf,
            'cidade' => $this ->cidade,
            'bairro' => $this ->bairro,
            'logradouro' => $this ->logradouro,
            'telefone' => $this ->telefone,
            'cep' => $this ->cep,
            'numeroCasa' => $this ->numeroCasa,
            'complemento' => $this ->complemento,
            'user_id' => $this ->user_id
        ];
    }
}
