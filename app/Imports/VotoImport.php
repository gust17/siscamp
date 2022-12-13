<?php

namespace App\Imports;

use App\Models\Candidato;
use App\Models\Cargo;
use App\Models\Cidade;
use App\Models\Escola;
use App\Models\Pleito;
use App\Models\Secao;
use App\Models\Voto;
use App\Models\Zona;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');

class VotoImport implements ToModel, WithHeadingRow, WithChunkReading ,ShouldQueue
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        //dd($row);


        $ano = $row['ANO_ELEICAO'];

        $pleito = Pleito::where('ano', $ano)->first();

        $zona = Zona::where("name", $row['NR_ZONA'])->where('estado_id', 1)->first();
        $cargo = Cargo::where('name', $row['DS_CARGO_PERGUNTA'])->first();
        $busca = Candidato::where('name', $row['NM_VOTAVEL'])->where('cargo_id', $cargo->id)->where('pleito_id', $pleito->id)->first();
        $secao = Secao::where('name', $row['NR_SECAO'])->where('zona_id', $zona->id)->first();
        $qtd = $row['QT_VOTOS'];

        $votos = Voto::where('candidato_id', $busca->id)->where('secao_id', $secao->id)->first();


        // dd($busca);
        // dd($votos);

        //dd($busca);
        if (!$votos) {
            return new Voto([
                'zona_id' => $zona->id,
                'secao_id' => $secao->id,
                'candidato_id' => $busca->id,
                'qtd' => $qtd
            ]);
        }
    }

    public function batchSize(): int
    {
        return 20;
    }


    public function chunkSize(): int
    {
        return 20;
    }
}
