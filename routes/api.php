<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('candidato/{id}', function ($id) {
    $candidato = \App\Models\Pleito::find($id);

    $pleitos = \App\Models\Pleito::where('name',$candidato->name)->orderBy('ano','asc')->get();



    foreach ($pleitos as $pleito){
        $busca[] = ['labels' => $pleito->ano, 'total' => $pleito->votos->sum('qtd')];
    }


    return json_encode($busca);



   // return $pleitos;
});
