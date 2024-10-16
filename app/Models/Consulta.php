<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;
    protected  $table = 'endereco';
    protected $fillable = [
        'diagnostico',
        'receita',
        'codigoConsulta',
        'agendamento_id'
    ];

    public function agendamento()
    {
        return $this->hasOne(Agendamento::class, 'id', 'agendamento_id');
    }
}
