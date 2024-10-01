<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;
    protected $table = 'enderecos';
    protected $fillable = [
        'uf',
        'cidade',
        'bairro',
        'logradouro',
        'telefone',
        'cep',
        'numeroCasa',
        'complemento',
    ];

    public function usuario()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
