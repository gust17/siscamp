<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escola extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'endereco',
        'bairro_id',
        'cidade_id',
        'estado_id',
        'cod'
    ];

    public function secaos()
    {
        return $this->hasMany(Secao::class);
    }

    public function cidade()
    {
        return $this->belongsTo(Cidade::class);
    }


    public function bairro()
    {
        return $this->belongsTo(Bairro::class);
    }

    public function totalVotos($id)
    {

        $total = 0;

        foreach ($this->secaos as $secao){
            $total+=$secao->totalVotos($id);
        }
        return $total;
    }



    public function totalVotoCan($id)
    {


        $novo = EscolaCandidato::where('escola_id', $this->attributes['id'])->where('candidato_id', $id)->first();


        if (!$novo) {
            return 0;
        } else {
            return $novo->qtd;
        }


    }


}
