<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EscolaCandidato extends Model
{
    use HasFactory;

    protected $fillable = [

        'escola_id',
        'candidato_id',
        'qtd'
    ];
}
