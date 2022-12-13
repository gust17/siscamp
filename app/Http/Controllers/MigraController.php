<?php

namespace App\Http\Controllers;

use App\Imports\BairroImport;
use App\Imports\CandidatoImport;
use App\Imports\CargoImport;
use App\Imports\CidadeImport;
use App\Imports\EscolaImport;
use App\Imports\SecaoImport;
use App\Imports\VotoImport;
use App\Imports\ZonaImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MigraController extends Controller
{
    //


    public function migraCidade(Request $request)
    {
        //dd($request->all());

        Excel::import(new CidadeImport,$request->file('arquivo'));

        return redirect()->back();
    }

    public function migraBairro(Request $request)
    {
        //dd($request->all());

        Excel::import(new BairroImport,$request->file('arquivo'));

        return redirect()->back();
    }

    public function migraEscola(Request $request)
    {
        //dd($request->all());

        Excel::import(new EscolaImport(),$request->file('arquivo'));

        return redirect()->back();
    }

    public function migraZona(Request $request)
    {
        //dd($request->all());

        Excel::import(new ZonaImport,$request->file('arquivo'));

        return redirect()->back();
    }
    public function migraSecao(Request $request)
    {
        //dd($request->all());

        Excel::import(new SecaoImport,$request->file('arquivo'));

        return redirect()->back();
    }
    public function migraCargo(Request $request)
    {
        //dd($request->all());

        Excel::import(new CargoImport(),$request->file('arquivo'));

        return redirect()->back();
    }

    public function migraCandidato(Request $request)
    {
        //dd($request->all());

        Excel::import(new CandidatoImport,$request->file('arquivo'));

        return redirect()->back();
    }


    public function migraVoto(Request $request)
    {
        //dd($request->all());

        Excel::import(new VotoImport,$request->file('arquivo'));

        return redirect()->back();
    }
}
