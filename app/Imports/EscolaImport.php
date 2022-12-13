<?php

namespace App\Imports;

use App\Models\Bairro;
use App\Models\Cidade;
use App\Models\Escola;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');
class EscolaImport implements ToModel,WithHeadingRow, WithChunkReading ,ShouldQueue
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        //dd($row);

        $cidade = Cidade::where('name', $row['CIDADE'])->first();
        // dd($cidade);
        $bairro = Bairro::where('name', $row['BAIRRO'])->where('cidade_id', $cidade->id)->first();
        // dd($bairro);
        $busca = Escola::where('name', $row['LOCAL'])->where('cidade_id', $cidade->id)->where('bairro_id', $bairro->id)->exists();
        //dd($busca);
        //dd($row);

        if (!$busca) {
            return new Escola([
                'name' => $row['LOCAL'],
                'endereco' => $row['ENDERECO'],
                'bairro_id' => $bairro->id,
                'cidade_id' => $cidade->id,
                'estado_id' => 1,
                'cod' => $row['COD']

            ]);
        }
    }

    public function chunkSize(): int
    {

        return 10;
        // TODO: Implement chunkSize() method.
    }
}
