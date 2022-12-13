<?php

namespace App\Imports;

use App\Models\Partido;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithUpserts;

class PartidoImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */


    public function model(array $row)
    {


        //dd($row);

       // $partido = utf8_decode($row[8]);

        //dd($partido);
        $busca = Partido::where('number', $row[18])->exists();
        //dd($busca);
        //dd($row);

        if (!$busca) {
            return new Partido([
                'name' => $row[20],
                'number' => $row[18],
                'sigla' => $row[19]

            ]);
        }
    }

    public function uniqueBy()
    {
        return ['name', 'number', 'sigla'];
    }
}
