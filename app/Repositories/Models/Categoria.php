<?php

namespace App\Repositories\Models;

use Database\Factories\CategoriaFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'categoria'
    ];

    public static function newFactory()
    {
        return CategoriaFactory::new();
    }

    public function filmes()
    {
        return $this->belongsToMany(Filme::class);
    }
}
