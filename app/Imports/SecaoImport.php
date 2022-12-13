<?php

namespace App\Imports;

use App\Models\Cidade;
use App\Models\Escola;
use App\Models\Secao;
use App\Models\Zona;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');
class SecaoImport implements ToModel, WithHeadingRow, WithChunkReading ,ShouldQueue
{
    /**\\
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        $zona = Zona::where("name",$row['NR_ZONA'])->where('estado_id',1)->first();

        $cidade = Cidade::where('name',$row['NM_MUNICIPIO'])->first();
        //dd($cidade);

        if (!$cidade){
            dd(utf8_decode($row[12]));
        }


        $escola = Escola::where('cod',$row['NR_LOCAL_VOTACAO'])->where('cidade_id',$cidade->id)->first();

        if (!$escola){
            dd($row);
        }

        //dd($escola);
        $busca = Secao::where('name', $row['NR_SECAO'])->where('zona_id',$zona->id)->exists();
        //dd($busca);
        //dd($row);

        if (!$busca) {
            return new Secao([

                'name'=>$row['NR_SECAO'],
                'zona_id'=>$zona->id,
                'escola_id'=>$escola->id,

            ]);
        }
    }

    public function chunkSize(): int
    {

        return 20;
        // TODO: Implement chunkSize() method.
    }
}
