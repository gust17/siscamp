<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cidade extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name','estado_id'];

    public function escolas()
    {
        return $this->hasMany(Escola::class);
    }

    public function bairros()
    {
        return $this->hasMany(Bairro::class);
    }


    public function totalSecao()
    {
        $total = 0 ;

        foreach ($this->escolas as $escola){
            $total += count($escola->secaos);
        }

        return $total;
    }

    public function totalVotos($id)
    {
        $total = 0;

        foreach ($this->bairros as $bairro){
            $total +=$bairro->totalVotoCan($id);
        }

        return $total;
    }


    public function pleitos()
    {
     return $this->hasMany(Pleito::class);
    }
}
