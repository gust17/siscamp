<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<table id="myTable2" class="table table-striped">
    <thead>
    <tr>
        <th>Cidade</th>
        <th>QTD Escolas</th>
        <th>QTD SECOES</th>
    </tr>
    </thead>
    <tbody>
    @forelse($cidades as $cidade)
        <tr>
            <td><a href="{{url('cidade',$cidade->id)}}">{{$cidade->name}}</a></td>
            <td>{{$cidade->escolas_count}}</td>
            <td>{{$cidade->totalSecao()}}</td>
        </tr>

    @empty



    @endforelse

    </tbody>
</table>

<div class="container">
    <div class="card">
        <div class="card-body">
            <table id="myTable3" class="table table-striped">
                <thead>
                <tr>
                    <th>Partido</th>
                    <th>SIGLA</th>
                    <th>QTD Candidatos</th>

                </tr>
                </thead>
                <tbody>
                @forelse($partidos as $partido)
                    <tr>
                        <td><a href="{{url('partido',$partido->id)}}">{{$partido->name}}</a></td>
                        <td>{{$partido->sigla}}</td>
                        <td>{{$partido->candidatos_count}}</td>

                    </tr>

                @empty



                @endforelse

                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="container">
    <div class="card">

        <div class="card-header">
            <h3 class="card-title">Estadual</h3>
        </div>
        <div class="card-body">
            <table id="myTable" class="table table-striped">
                <thead>
                <tr>
                    <th>Candidato</th>
                    <th>Partido</th>
                    <th>Cargo</th>
                    <th>QTD votos</th>

                </tr>
                </thead>
                <tbody>
                @forelse($estaduais as $candidato)
                    <tr>
                        <td><a href="{{url('candidato',$candidato->id)}}">{{$candidato->name}}</a></td>
                        <td>{{$candidato->partido->name}}</td>
                        <td>{{$candidato->cargo->name}}</td>
                        <td>{{$candidato->votos->sum('qtd')}}</td>

                    </tr>

                @empty



                @endforelse

                </tbody>
            </table>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Federal</h3>
        </div>
        <div class="card-body">
            <table id="federal" class="table table-striped">
                <thead>
                <tr>
                    <th>Candidato</th>
                    <th>Partido</th>
                    <th>Cargo</th>
                    <th>QTD votos</th>

                </tr>
                </thead>
                <tbody>
                @forelse($federals as $candidato)
                    <tr>
                        <td><a href="{{url('candidato',$candidato->id)}}">{{$candidato->name}}</a></td>
                        <td>{{$candidato->partido->name}}</td>
                        <td>{{$candidato->cargo->name}}</td>
                        <td>{{$candidato->votos->sum('qtd')}}</td>

                    </tr>

                @empty



                @endforelse

                </tbody>
            </table>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Senador</h3>
        </div>
        <div class="card-body">
            <table id="senador" class="table table-striped">
                <thead>
                <tr>
                    <th>Candidato</th>
                    <th>Partido</th>
                    <th>Cargo</th>
                    <th>QTD votos</th>

                </tr>
                </thead>
                <tbody>
                @forelse($senadors as $candidato)
                    <tr>
                        <td>{{$candidato->name}}</td>
                        <td>{{$candidato->partido->name}}</td>
                        <td>{{$candidato->cargo->name}}</td>
                        <td>{{$candidato->votos->sum('qtd')}}</td>

                    </tr>

                @empty



                @endforelse

                </tbody>
            </table>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Governador</h3>
        </div>
        <div class="card-body">
            <table id="governador" class="table table-striped">
                <thead>
                <tr>
                    <th>Candidato</th>
                    <th>Partido</th>
                    <th>Cargo</th>
                    <th>QTD votos</th>

                </tr>
                </thead>
                <tbody>
                @forelse($governadors as $candidato)
                    <tr>
                        <td>{{$candidato->name}}</td>
                        <td>{{$candidato->partido->name}}</td>
                        <td>{{$candidato->cargo->name}}</td>
                        <td>{{$candidato->votos->sum('qtd')}}</td>

                    </tr>

                @empty



                @endforelse

                </tbody>
            </table>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Presidente</h3>
        </div>
        <div class="card-body">
            <table id="presidente" class="table table-striped">
                <thead>
                <tr>
                    <th>Candidato</th>
                    <th>Partido</th>
                    <th>Cargo</th>
                    <th>QTD votos</th>

                </tr>
                </thead>
                <tbody>
                @forelse($presidents as $candidato)
                    <tr>
                        <td>{{$candidato->name}}</td>
                        <td>{{$candidato->partido->name}}</td>
                        <td>{{$candidato->cargo->name}}</td>
                        <td>{{$candidato->votos->sum('qtd')}}</td>

                    </tr>

                @empty



                @endforelse

                </tbody>
            </table>
        </div>
    </div>

</div>

<div class="container">
<form enctype="multipart/form-data" action="{{url('arquivo')}}" method="post">

    @csrf
    <input type="file" name="arquivo">
    <button type="submit">vai</button>
</form>


<h1>Cidade</h1>

<form enctype="multipart/form-data" action="{{url('cidade')}}" method="post">

    @csrf
    <input type="file" name="arquivo">
    <button type="submit">vai</button>
</form>

<h1>Bairro</h1>

<form enctype="multipart/form-data" action="{{url('bairro')}}" method="post">

    @csrf
    <input type="file" name="arquivo">
    <button type="submit">vai</button>
</form>

<h1>Escola</h1>

<form enctype="multipart/form-data" action="{{url('escola')}}" method="post">

    @csrf
    <input type="file" name="arquivo">
    <button type="submit">vai</button>
</form>

<h1>Zona</h1>

<form enctype="multipart/form-data" action="{{url('zona')}}" method="post">

    @csrf
    <input type="file" name="arquivo">
    <button type="submit">vai</button>
</form>

<h1>secao</h1>

<form enctype="multipart/form-data" action="{{url('secao')}}" method="post">

    @csrf
    <input type="file" name="arquivo">
    <button type="submit">vai</button>
</form>


<h1>cargo</h1>

<form enctype="multipart/form-data" action="{{url('cargo')}}" method="post">

    @csrf
    <input type="file" name="arquivo">
    <button type="submit">vai</button>
</form>


    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Candidatos</h3>
            </div>

            <div class="card-body">


                <form enctype="multipart/form-data" action="{{url('pleito')}}" method="post">

                    @csrf


                    <div class="form-group">
                        <label for="">Arquivo</label>
                        <input class="form-control" type="file" name="arquivo">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type="submit">vai</button>
                    </div>


                </form>
            </div>
        </div>

    </div>



    <h1>voto</h1>

    <form enctype="multipart/form-data" action="{{url('voto')}}" method="post">

        @csrf
        <input type="file" name="arquivo">
        <button type="submit">vai</button>
    </form>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
        $('#myTable2').DataTable();
        $('#myTable3').DataTable();
        $('#federal').DataTable();
        $('#senador').DataTable();
        $('#governador').DataTable();
        $('#presidente').DataTable();
    } );
</script>
</body>
</html>
