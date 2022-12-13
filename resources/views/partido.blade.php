<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>{{$partido->name}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>


@foreach($anos as $ano)

    <div class="container">
        <div class="card">

            <div class="card-header">
                <h3 class="card-title">{{$partido->name}} Estadual {{$ano->ano}}</h3>
            </div>
            <div class="card-body">
                <table id="myTable{{$ano->ano}}" class="table table-striped">
                    <thead>
                    <tr>
                        <th>Candidato</th>
                        <th>Partido</th>
                        <th>Ano</th>
                        <th>Cargo</th>
                        <th>QTD votos</th>

                    </tr>
                    </thead>
                    <tbody>
                    @forelse($partido->candidatos->where('pleito_id',1) as $candidato)
                        <tr>
                            <td><a href="{{url('candidato',$candidato->id)}}">{{$candidato->name}}</a></td>
                            <td>{{$candidato->partido->name}}</td>
                            <td>{{$candidato->ano}}</td>
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




@endforeach

<div class="container">
    <div class="card">

        <div class="card-header">
            <h3 class="card-title">{{$partido->name}} Vereador 2020</h3>
        </div>
        <div class="card-body">
            <table id="vereador" class="table table-striped">
                <thead>
                <tr>
                    <th>Candidato</th>
                    <th>Partido</th>
                    <th>Ano</th>
                    <th>Cargo</th>
                    <th>QTD votos</th>

                </tr>
                </thead>
                <tbody>
                @forelse($partido->candidatos->where('pleito_id',1) as $candidato)
                    <tr>
                        <td><a href="{{url('candidato',$candidato->id)}}">{{$candidato->name}}</a></td>
                        <td>{{$candidato->partido->name}}</td>
                        <td>{{$candidato->ano}}</td>
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
    <div class="card">

        <div class="card-header">
            <h3 class="card-title">{{$partido->name}} Prefeito 2020</h3>
        </div>
        <div class="card-body">
            <table id="vereador" class="table table-striped">
                <thead>
                <tr>
                    <th>Candidato</th>
                    <th>Partido</th>
                    <th>Ano</th>
                    <th>Cargo</th>
                    <th>QTD votos</th>

                </tr>
                </thead>
                <tbody>
                @forelse($partido->candidatos->where('pleito_id',1) as $candidato)
                    <tr>
                        <td><a href="{{url('candidato',$candidato->id)}}">{{$candidato->name}}</a></td>
                        <td>{{$candidato->partido->name}}</td>
                        <td>{{$candidato->ano}}</td>
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


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready( function () {


        @foreach($anos as $ano)

        $('#myTable{{$ano->ano}}').DataTable();


        @endforeach
        $('#myTable2').DataTable();
        $('#myTable3').DataTable();
        $('#vereador').DataTable();
        $('#cidade').DataTable();
        $('#federal').DataTable();
        $('#senador').DataTable();
        $('#governador').DataTable();
        $('#presidente').DataTable();
    } );
</script>
</body>
</html>
