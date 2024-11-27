<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Financeiro extends Model
{
    use HasFactory;
    protected $table = 'financeiro';
    protected $fillable = [
        'id',
        'tipo',
        'valor',
        'data_vencimento',
        'data_pagamento',
        'status',
        'descricao',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
