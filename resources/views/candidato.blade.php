<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>{{$candidato->name}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <canvas id="myChart" width="800" height="450"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-titel">Total Votos {{$candidato->ano}}</h3>
                </div>
                <div class="card-body">
                    {{$candidato->votos->sum('qtd')}}
                </div>
            </div>

        </div>


        @forelse($candidato->pleitoAnterior() as $outro)

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-titel">Total Votos {{$outro->ano}}</h3>
                    </div>
                    <div class="card-body">
                        {{$outro->votos->sum('qtd')}}
                    </div>
                </div>

            </div>
        @empty

        @endforelse
    </div>
</div>


<div class="container">
    <div class="card">

        <div class="card-header">
            <h3 class="card-title">Secao</h3>
        </div>
        <div class="card-body">
            <table id="myTable2" class="table table-striped">
                <thead>
                <tr>
                    <th>Secao</th>
                    <th>Cidade</th>
                    <th>Escola</th>
                    <th>Votos {{$candidato->ano}}</th>

                    @forelse($candidato->pleitoAnterior() as $outro)

                        <th>Votos {{$outro->ano}}</th>
                    @empty

                    @endforelse

                </tr>
                </thead>
                <tbody>

                @forelse($secaos as $secao)
                    <tr>
                        <td>{{$secao->name}}</td>
                        <td>{{$secao->escola->cidade->name}}</td>
                        <td>{{$secao->escola->name}}</td>
                        <td>{{$secao->totalVotos($candidato->id)}}</td>

                        @forelse($candidato->pleitoAnterior() as $outro)
                            <td>{{$secao->totalVotos($outro->id)}}</td>

                        @empty

                        @endforelse

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
            <h3 class="card-title">Escolas</h3>
        </div>
        <div class="card-body">
            <table id="myTable3" class="table table-striped">
                <thead>
                <tr>
                    <th>Escola</th>
                    <th>Cidade</th>
                    <th>Bairro</th>
                    <th>Votos {{$candidato->ano}}</th>
                    @forelse($candidato->pleitoAnterior() as $outro)

                        <th>Votos {{$outro->ano}}</th>
                    @empty

                    @endforelse

                </tr>
                </thead>
                <tbody>
                @forelse($escolas as $escola)
                    <tr>
                        <td>{{$escola->name}}</td>
                        <td>{{$escola->cidade->name}}</td>
                        <td>{{$escola->bairro->name}}</td>
                        <td>{{$escola->totalVotoCan($candidato->id)}}</td>

                        @forelse($candidato->pleitoAnterior() as $outro)
                            <td>{{$escola->totalVotoCan($outro->id)}}</td>

                        @empty

                        @endforelse

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
            <h3 class="card-title">Bairros</h3>
        </div>
        <div class="card-body">
            <table id="bairro" class="table table-striped">
                <thead>
                <tr>
                    <th>Bairro</th>
                    <th>Cidade</th>

                    <th>Votos {{$candidato->ano}}</th>

                    @forelse($candidato->pleitoAnterior() as $outro)

                        <th>Votos {{$outro->ano}}</th>
                    @empty

                    @endforelse

                </tr>
                </thead>
                <tbody>
                @forelse($bairros as $bairro)
                    <tr>
                        <td>{{$bairro->name}}</td>
                        <td>{{$bairro->cidade->name}}</td>
                        <td>{{$bairro->totalVotoCan($candidato->id)}}</td>

                        @forelse($candidato->pleitoAnterior() as $outro)
                            <td>{{$bairro->totalVotoCan($outro->id)}}</td>

                        @empty

                        @endforelse


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
            <h3 class="card-title">Cidade</h3>
        </div>
        <div class="card-body">
            <table id="cidade" class="table table-striped">
                <thead>
                <tr>

                    <th>Cidade</th>

                    <th>Votos {{$candidato->ano}}</th>

                    @forelse($candidato->pleitoAnterior() as $outro)

                        <th>Votos {{$outro->ano}}</th>
                    @empty

                    @endforelse

                </tr>
                </thead>
                <tbody>
                @forelse($cidades as $cidade)
                    <tr>

                        <td>{{$cidade->name}}</td>
                        <td>{{$cidade->totalVotos($candidato->id)}}</td>

                        @forelse($candidato->pleitoAnterior() as $outro)
                            <td>{{$cidade->totalVotos($outro->id)}}</td>

                        @empty

                        @endforelse


                    </tr>

                @empty



                @endforelse

                </tbody>
            </table>
        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.print.min.js"></script>

<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
        $('#myTable2').DataTable();
        $('#myTable3').DataTable();
        $('#bairro').DataTable();
        $('#federal').DataTable();
        $('#senador').DataTable();
        $('#governador').DataTable();
        $('#presidente').DataTable();
        $('#cidade').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.4/i18n/pt_br.json'
            },
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
        });
    });
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

<script>
    $(function () {
        var ctx = document.getElementById("myChart").getContext("2d");
        // examine example_data.json for expected response data
        var json_url = '{{url('api/candidato',$candidato->id)}}';

        // draw empty chart
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [],
                datasets: [
                    {
                        label: "My First dataset",
                        fill: false,
                        lineTension: 0.1,
                        backgroundColor: "rgba(75,192,192,0.4)",
                        borderColor: "rgba(75,192,192,1)",
                        borderCapStyle: 'butt',
                        borderDash: [],
                        borderDashOffset: 0.0,
                        borderJoinStyle: 'miter',
                        pointBorderColor: "rgba(75,192,192,1)",
                        pointBackgroundColor: "#fff",
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: "rgba(75,192,192,1)",
                        pointHoverBorderColor: "rgba(220,220,220,1)",
                        pointHoverBorderWidth: 2,
                        pointRadius: 1,
                        pointHitRadius: 10,
                        data: [],
                        spanGaps: false,
                    }

                ]
            },
            options: {
                tooltips: {
                    mode: 'index',
                    intersect: false
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        ajax_chart(myChart, json_url);

        // function to update our chart
        function ajax_chart(chart, url, data) {


            $.getJSON(url, data).done(function (response) {


                var datas = response;
                var labels = [],
                    total = [];

                $.each(datas, function (i, data) {
                    labels.push(data.labels);
                    total.push(data.total);

                });
                chart.data.labels = labels;
                chart.data.datasets[0].data = total // or you can iterate for multiple datasets
                chart.update(); // finally update our chart
            });
        }
    });
</script>
</body>
</html>
