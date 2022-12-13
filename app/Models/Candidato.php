<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    use HasFactory;



    protected $fillable = [
        'pleito_id',
        'name',
        'numero' ,
        'partido_id',
        'cargo_id'
    ];


    public function pleito()
    {
        return $this->belongsTo(Pleito::class);
    }

    public function partido()
    {
      return $this->belongsTo(Partido::class);
    }

    public function cargo()
    {
        return $this->belongsTo(Cargo::class);
    }

    public function votos()
    {
        return $this->hasMany(Voto::class);
    }


    public function pleitoAnterior()
    {
        $pleitos = Candidato::where('name', $this->attributes['name'])->whereNotIn('id', [$this->attributes['id']])->get();

        return $pleitos;
    }
}
