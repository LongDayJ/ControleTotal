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
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
