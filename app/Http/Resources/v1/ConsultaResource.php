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
'id' => $this -> id,
            'queixa' => $this -> queixa,
            'medicacao_pre_consulta' => $this -> medicacao_pre_consulta,
            'alergia' => $this -> alergia,
            'cirurgia' => $this -> cirurgia,
            'falta_ar' => $this -> falta_ar,
            'gestante' => $this -> gestante,
            'semanas' => $this -> semanas,
            'observacoes' => $this -> observacoes,
            'codigoConsulta' => $this -> codigoConsulta,
            'agendamento_id' => $this -> agendamento_id

        ];
    }
}
