<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bairro extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
        'name',
        'cidade_id'
    ];


    public function totalVotoCandidato($id)
    {

    }

    public function cidade()
    {
        return $this->belongsTo(Cidade::class);
    }


    public function escolas()
    {
        return $this->hasMany(Escola::class);
    }


    public function totalVotos($id)
    {
        $total = 0;


        foreach ($this->escolas as $escola) {
            $total += $escola->totalVotoCan($id);
        }

        return $total;
    }


    public function totalVotoCan($id)
    {


        $novo = BairroCandidato::where('bairro_id', $this->attributes['id'])->where('candidato_id', $id)->first();


        if (!$novo) {
            return 0;
        } else {
            return $novo->qtd;
        }


    }
}
