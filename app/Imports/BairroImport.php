<?php

namespace App\Imports;

use App\Models\Bairro;
use App\Models\Cidade;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');
class BairroImport implements ToModel,WithHeadingRow, WithChunkReading ,ShouldQueue
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        //dd($row);


        $cidade = Cidade::where('name',$row['CIDADE'])->first();

        //dd($cidade);

        $busca = Bairro::where('name', $row['BAIRRO'])->where('cidade_id',$cidade->id)->exists();
        //dd($busca);
        //dd($row);

        if (!$busca) {
            return new Bairro([
                'name' => $row['BAIRRO'],
                'cidade_id'=> $cidade->id

            ]);
        }
    }

    public function chunkSize(): int
    {

        return 10;
        // TODO: Implement chunkSize() method.
    }
}
