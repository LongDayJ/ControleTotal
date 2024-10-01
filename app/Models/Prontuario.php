<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prontuario extends Model
{
    use HasFactory;
    protected $table = 'Prontuario';
    protected $fillable = [
        'historico',
        'observacao',
        
    ];

    public function consulta()
    {
        return $this->hasOne(Consulta::class, 'id', 'consulta_id');
    }
}
