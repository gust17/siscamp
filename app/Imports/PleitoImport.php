<?php

namespace App\Imports;

use App\Models\Cargo;
use App\Models\Cidade;
use App\Models\Partido;
use App\Models\Pleito;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');

class PleitoImport implements ToModel, WithHeadingRow, WithChunkReading, ShouldQueue
{


    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {


        $ano = $row['ANO_ELEICAO'];


        $partido = Partido::where('number', $row['NR_PARTIDO'])->first();

        //d($partido)

        if (!$partido){

            $partido = Partido::create([
                'name' => $row['NM_PARTIDO'],
                'number' => $row['NR_PARTIDO'],
                'sigla' => $row['SG_PARTIDO']

            ]);
        }

        $cargo = Cargo::where('name', $row['DS_CARGO_PERGUNTA'])->first();

        if (!$cargo){
            dd($row);
        }

        $name = $row['NM_VOTAVEL'];
        $number = $row['NR_VOTAVEL'];


        $busca = Pleito::where('name', $name)->where('cargo_id', $cargo->id)->where('ano', $ano)->exists();

        //dd($row);

        if ($cargo->id == 6 || $cargo->id == 7) {
            $cidade = Cidade::where('name', $row['NM_MUNICIPIO'])->first();
            if (!$busca) {
                return new Pleito([
                    'ano' => $ano,
                    'name' => $name,
                    'number' => $number,
                    'partido_id' => $partido->id,
                    'cargo_id' => $cargo->id,
                    'cidade_id' => $cidade->id
                ]);
            }

        } else {
            if (!$busca) {
                return new Pleito([
                    'ano' => $ano,
                    'name' => $name,
                    'number' => $number,
                    'partido_id' => $partido->id,
                    'cargo_id' => $cargo->id,
                    'majoritaria' => 1
                ]);
            }
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
