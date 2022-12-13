<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('novo', function () {

    //return view('padrao.base');

    $cidades = \App\Models\Cidade::withCount('escolas')->get();
    $partidos = \App\Models\Partido::withCount('candidatos')->get();
    $estaduais = [];
    $federals = [];
    $senadors = [];
    $governadors = [];
    $presidents = [];
    return view('teste', compact('cidades', 'partidos', 'estaduais', 'federals', 'senadors', 'governadors', 'presidents'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('cidade', [\App\Http\Controllers\MigraController::class, 'migraCidade']);
Route::post('bairro', [\App\Http\Controllers\MigraController::class, 'migraBairro']);
Route::post('escola', [\App\Http\Controllers\MigraController::class, 'migraEscola']);
Route::post('zona', [\App\Http\Controllers\MigraController::class, 'migraZona']);
Route::post('secao', [\App\Http\Controllers\MigraController::class, 'migraSecao']);
Route::post('cargo', [\App\Http\Controllers\MigraController::class, 'migraCargo']);
Route::post('pleito', [\App\Http\Controllers\MigraController::class, 'migraCandidato']);
Route::post('voto', [\App\Http\Controllers\MigraController::class, 'migraVoto']);

Route::get('partido/{id}', function ($id) {
    $partido = \App\Models\Partido::find($id);
    $anos = \App\Models\Pleito::all();
    $cidades = \App\Models\Cidade::all();
    return view('partido', compact('partido', 'anos', 'cidades'));
});

Route::get('candidato/{id}', function ($id) {
    $candidato = \App\Models\Candidato::find($id);
    $escolas = \App\Models\Escola::all();
    $secaos = \App\Models\Secao::all();
    $bairros = \App\Models\Bairro::all();
    $cidades = \App\Models\Cidade::all();
    return view('candidato', compact('candidato', 'secaos', 'escolas', 'bairros', 'cidades'));
});


Route::get('migra/{id}', function ($id) {

    $candidato = \App\Models\Candidato::find($id);
//dd($candidato);

    $escolas = \App\Models\Escola::all();


    foreach ($escolas as $escola) {

        $total = $escola->totalVotos($id);


        \App\Models\EscolaCandidato::create(['candidato_id' => $id, 'escola_id' => $escola->id, 'qtd' => $total]);

    }

    return redirect()->back();
});


Route::get('migra/{id}', function ($id) {

    $candidato = \App\Models\Candidato::find($id);
//dd($candidato);

    $escolas = \App\Models\Escola::all();


    foreach ($escolas as $escola) {

        $total = $escola->totalVotos($id);


        \App\Models\EscolaCandidato::create(['candidato_id' => $id, 'escola_id' => $escola->id, 'qtd' => $total]);

    }

    return redirect()->back();
});



require __DIR__ . '/auth.php';
