<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Procedimento extends Model
{
    use HasFactory, Notifiable;
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'descricao',
        'codigo_procedimento',
        'id_procedimento_pai',
    ];

    // Relacionamento com o procedimento pai
    public function procedimentoPai()
    {
        return $this->belongsTo(Procedimento::class, 'id_procedimento_pai');
    }

    // Relacionamento com os subprocedimentos (procedimentos filhos)
    public function subprocedimentos()
    {
        return $this->hasMany(Procedimento::class, 'id_procedimento_pai');
    }
}

