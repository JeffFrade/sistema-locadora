<?php

namespace App\Repositories\Models;

use Database\Factories\ClienteFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nome',
        'cpf',
        'contato',
        'data_nascimento',
        'status'
    ];

    public static function newFactory()
    {
        return ClienteFactory::new();
    }
}
