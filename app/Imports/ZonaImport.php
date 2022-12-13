<?php

namespace App\Imports;

use App\Models\Zona;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');
class ZonaImport implements ToModel, WithHeadingRow, WithChunkReading ,ShouldQueue
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $busca = Zona::where('name', $row['NR_ZONA'])->exists();
        //dd($busca);
        //dd($row);

        if (!$busca) {
            return new Zona([
                'name' => $row['NR_ZONA'],
                'estado_id'=>1

            ]);
        }
    }

    public function chunkSize(): int
    {

        return 100;
        // TODO: Implement chunkSize() method.
    }
}
