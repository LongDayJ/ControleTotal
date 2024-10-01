<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dentista extends Model
{
    use HasFactory;
    protected  $table = 'dentista';
    protected $fillable = [
        'nome',
        'descricao',
        'status',
        'cro',
    ];
}
