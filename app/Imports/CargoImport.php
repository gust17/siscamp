<?php

namespace App\Imports;

use App\Models\Cargo;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;


HeadingRowFormatter::default('none');

class CargoImport implements ToModel, WithHeadingRow, WithChunkReading, ShouldQueue
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        //dd($row);
        // dd($bairro);
        $busca = Cargo::where('name', $row['DS_CARGO_PERGUNTA'])->exists();
        //dd($busca);
        //dd($row);

        if (!$busca) {
            return new Cargo([
                'name' => $row['DS_CARGO_PERGUNTA'],


            ]);
        }
    }

    public function chunkSize(): int
    {

        return 20;
        // TODO: Implement chunkSize() method.
    }
}
