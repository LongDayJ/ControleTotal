<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    use HasFactory;
    protected $table = 'agendamento';
    protected $fillable = [
        'data',
        'hora',
        'status',
        'observacao',
        'user_id',
        'dentista_id',
        'procedimento_id',
        'color'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
