<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;
    protected  $table = 'endereco';
    protected $fillable = [
        'queixa',
        'medicacao_pre_consulta',
        'alergia',
        'cirurgia',
        'sangramento',
        'cicatrizacao',
        'falta_ar',
        'gestante',
        'semanas',
        'observacoes',
    ];

    public function agendamento()
    {
        return $this->hasOne(Agendamento::class, 'id', 'agendamento_id');
    }
}
