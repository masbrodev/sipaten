@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">Grafik BMN Keseluruhan <b>{{count($nama). ' | '. collect($jumlah)->sum()}}</b></h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="donutChart" style="height:230px; min-height:586px"></canvas>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>
@endsection

@section('adminlte_js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')

    function dynamicColors() {
        var r = Math.floor(Math.random() * 255);
        var g = Math.floor(Math.random() * 255);
        var b = Math.floor(Math.random() * 255);
        return "rgba(" + r + "," + g + "," + b + ", 0.5)";
    }

    function poolColors(a) {
        var pool = [];
        for (i = 0; i < a; i++) {
            pool.push(dynamicColors());
        }
        return pool;
    }

    var donutData = {
        labels: @json($nama),
        datasets: [{
            data: @json($jumlah),
            backgroundColor: poolColors(@json($nama).length),
            borderColor: poolColors(@json($nama).length),
            hoverOffset: 40,
        }]
    }
    var donutOptions = {
        maintainAspectRatio: false,
        responsive: true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var donutChart = new Chart(donutChartCanvas, {
        type: 'pie',
        data: donutData,
        options: donutOptions
    })
</script>
@endsection
