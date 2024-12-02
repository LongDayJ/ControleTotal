<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prontuario extends Model
{
    use HasFactory;
    protected $table = 'prontuario';
    protected $fillable = [
        'historico',
        'observacao',
        'consulta_id'
        
    ];

    public function consulta()
    {
        return $this->hasOne(Consulta::class, 'id', 'consulta_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
