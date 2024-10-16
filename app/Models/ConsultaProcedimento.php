<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsultaProcedimento extends Model
{
    use HasFactory;

    protected $table = 'consulta_procedimentos';

    protected $fillable = [
        'consulta_id',
        'procedimento_id',
        'preco',
    ];

    public function consulta()
    {
        return $this->belongsTo(Consulta::class);
    }

    public function procedimento()
    {
        return $this->belongsTo(Procedimento::class);
    }
}
