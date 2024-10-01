<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
    use HasFactory;
    protected $table = 'estoques';
    protected $fillable = [
        'nome',
        'quantidade'
    ];
    public function produto()
    {
        return $this->hasOne(Produto::class, 'id', 'produto_id');
    }
}
