<?php

namespace App\Imports;

use App\Models\Cidade;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');
class CidadeImport implements ToModel, WithHeadingRow, WithChunkReading, ShouldQueue
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        //dd($row);
        $busca = Cidade::where('name', $row['CIDADE'])->exists();
        //dd($busca);
        //dd($row);

        if (!$busca) {
            return new Cidade([
                'name' => $row['CIDADE'],
                'estado_id' => 1

            ]);
        }
    }

    public function chunkSize(): int
    {

        return 2;
        // TODO: Implement chunkSize() method.
    }
}
