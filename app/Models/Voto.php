<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voto extends Model
{
    use HasFactory;

    protected $fillable = [
        'zona_id',
        'secao_id',
        'candidato_id',
        'qtd'
    ];


    public function secao()
    {
        return $this->belongsTo(Secao::class);
    }

    public function zona()
    {
        return $this->belongsTo(Zona::class);
    }
}
