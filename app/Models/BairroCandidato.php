<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BairroCandidato extends Model
{
    use HasFactory;
    protected $fillable = [

        'bairro_id',
        'candidato_id',
        'qtd'
    ];
}
