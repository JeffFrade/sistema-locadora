<?php

namespace App\Repositories\Models;

use Database\Factories\FilmeFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Filme extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'titulo',
        'lancamento',
        'disponivel',
        'id_categoria'
    ];

    public static function newFactory()
    {
        return FilmeFactory::new();
    }

    public function categoria()
    {
        return $this->hasOne(Categoria::class, 'id', 'id_categoria');
    }

}
