<?php

namespace App\Imports;

use App\Models\Candidato;
use App\Models\Cargo;
use App\Models\Cidade;
use App\Models\Partido;
use App\Models\Pleito;

use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;


HeadingRowFormatter::default('none');

class CandidatoImport implements ToModel, WithHeadingRow, WithChunkReading, ShouldQueue
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {


        $ano = $row['ANO_ELEICAO'];

        //dd($ano);
        $pleito = Pleito::where('ano', $ano)->first();


        $partido = Partido::where('number', $row['NR_PARTIDO'])->first();

        //d($partido)

        if (!$partido) {

            $partido = Partido::create([
                'name' => $row['NM_PARTIDO'],
                'number' => $row['NR_PARTIDO'],
                'sigla' => $row['SG_PARTIDO']

            ]);
        }

        $cargo = Cargo::where('name', $row['DS_CARGO_PERGUNTA'])->first();

        if (!$cargo) {
            $cargo = Cargo::create([
                'name' => $row['DS_CARGO_PERGUNTA'],


            ]);
        }

        $name = $row['NM_VOTAVEL'];
        $number = $row['NR_VOTAVEL'];


        $busca = Candidato::where('name', $name)->where('cargo_id', $cargo->id)->where('pleito_id', $pleito->id)->exists();

        //dd($row);

        if ($ano == 2020 || $cargo->id == 2016) {
            $cidade = Cidade::where('name', $row['NM_MUNICIPIO'])->first();
            if (!$busca) {
                return new Candidato([
                    'pleito_id' => $pleito->id,
                    'name' => $name,
                    'numero' => $number,
                    'partido_id' => $partido->id,
                    'cargo_id' => $cargo->id,
                    'cidade_id' => $cidade->id
                ]);
            }

        } else {
            if (!$busca) {
                return new Candidato([
                    'pleito_id' => $pleito->id,
                    'name' => $name,
                    'numero' => $number,
                    'partido_id' => $partido->id,
                    'cargo_id' => $cargo->id,

                ]);
            }
        }

    }

    public function chunkSize(): int
    {
        return 100;
        // TODO: Implement chunkSize() method.
    }
}
