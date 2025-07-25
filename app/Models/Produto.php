<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    protected $table = 'produtos';
    protected $fillable = [
        'id',
        'nome',
    ];

    public function estoque()
    {
        return $this->hasOne(Estoque::class, 'produto_id');
    }
}