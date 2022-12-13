<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secao extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'zona_id',
        'escola_id'
    ];


    public function escola()
    {
        return $this->belongsTo(Escola::class);
    }

    public function votos()
    {
        return $this->hasMany(Voto::class);
    }

    public function zona()
    {
        return $this->belongsTo(Zona::class);

    }

    public function totalVotos($id)
    {
        return $this->votos->where('candidato_id',$id)->sum('qtd');
    }
}
