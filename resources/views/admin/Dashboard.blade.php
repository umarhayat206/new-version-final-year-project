@extends('layouts.MasterAdmin')
@section('content')
    <nav aria-label="breadcrumb" class="main-breadcrumb" style="margin-top:-35px;">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </nav>
    
    <div class="row">
        {{-- <p id="demo"></p> --}}
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Total Parties</span>
                    <span class="info-box-number">
                        {{ $parties }}

                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
       

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Total Candidates</span>
                    <span class="info-box-number">{{ $candidates }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Total Voters</span>
                    <span class="info-box-number">{{ $voters }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Total MNA</span>
                    <span class="info-box-number">{{ $mnas }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Total MPA</span>
                    <span class="info-box-number">{{ $mpas }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>

    <br>
    <div class="row">
        <div class="col-lg-6">
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">National Assembley Results</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i>
                        </button>
                        {{-- <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button> --}}
                    </div>
                </div>
                <div class="card-body">
                    <div id="chart_div1122"></div>
                </div>

            </div>
        </div>
        <div class="col-lg-6">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Province Assembley Results</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i>
                        </button>
                        {{-- <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button> --}}
                    </div>
                </div>
                <div class="card-body">
                    <div id="chart_div1133"></div>
                </div>

            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-lg-4">

        </div>
    </div>
    
    <div class="card card-primary">
        <div class="card-header">

            <div class="row">
                <div class="col-lg-4">
                    <h3 class="card-title" style="margin-top:10px;">Filter National Assembley Results</h3>
                </div>
                <div class="col-lg-4"></div>
                <div class="col-lg-4">
                    @php
                        $nationalAreas = App\Models\NationalArea::all();
                    @endphp
                    <select class="form-control" name="area" id="national">
                        <option value="">Select Area</option>
                        @foreach ($nationalAreas as $area)
                            <option value="{{ $area->id }}">{{ $area->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div id="chart_div" style="height:350px"></div>
        </div>

    </div>

    <div class="card card-primary">
        <div class="card-header">

            <div class="row">
                <div class="col-lg-4">
                    <h3 class="card-title" style="margin-top:10px;">Filter Province Assembley Results</h3>
                </div>
                <div class="col-lg-4"></div>
                <div class="col-lg-4">
                    @php
                        $nationalAreas = App\Models\ProvinceArea::all();
                    @endphp
                    <select class="form-control" name="area" id="province">
                        <option value="">Select Area</option>
                        @foreach ($nationalAreas as $area)
                            <option value="{{ $area->id }}">{{ $area->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div id="chart_div23" style="height:350px"></div>
        </div>

    </div>




    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var record = {!! json_encode($arrayClass) !!};
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Party name');
            data.addColumn('number', 'vote count');
            $.each(record, (i, record) => {
                let name = record.name;
                let count = parseFloat($.trim(record.votecount));
                data.addRows([
                    [name, count]

                ]);
            })
            var options = {
                
                'width': 500,
                'height': 300
            };
            var chart = new google.visualization.PieChart(document.getElementById('chart_div1122'));
            chart.draw(data, options);
        }
    </script>


    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var record = {!! json_encode($arrayClass2) !!};
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Topping');
            data.addColumn('number', 'Slices');
            $.each(record, (i, record) => {
                let name = record.name;
                let count = parseFloat($.trim(record.votecount));
                data.addRows([
                    [name, count]

                ]);
            })


            var options = {
                
                'width': 500,
                'height': 300
            };


            var chart = new google.visualization.PieChart(document.getElementById('chart_div1133'));
            chart.draw(data, options);
        }
    </script>


@endsection
@push('js')

    <script>
        $(document).ready(function() {
            $('#national').change(function() {

                const area = $(this).val();

                if (area != '') {
                    load_monthly_data(area, 'Results for Na-');
                }

            })

        });
        $(document).ready(function() {
            $('#province').change(function() {
               
                const area = $(this).val();
                // alert('ppa'+area);
                if (area != '') {
                    load_monthly_data2(area, 'Results for Pa-');
                }

            })

        });
    </script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      
        google.charts.load('current', {
            'packages': ['corechart']
        });

    
        google.charts.setOnLoadCallback(drawMonthlyChart);
        function drawMonthlyChart(chart_data, chart_main_title) {
            let jsonData = chart_data;
           
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Months');
            data.addColumn('number', 'Count');
            $.each(jsonData, (i, jsonData) => {
                let name = jsonData.name;
                let count = parseFloat($.trim(jsonData.count));
                data.addRows([
                    [name, count]

                ]);
            })

            var options = {
                title: chart_main_title,
                hAxis: {
                    title: 'Parties'
                },
                vAxis: {
                    title: ''
                },
                colors: ['#007bff'],
                chartArea: {
                    width: '80%',
                    height: '70%'
                }
            };

            var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }

        function load_monthly_data(area, title) {
            const temp_title = title + ' ' + area;
            var _token = $("input[name='_token']").val();
            $.ajax({
                url: 'chart/fetch_data',
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    area: area
                },

                dataType: 'json',

                success: function(data) {

                    drawMonthlyChart(data, temp_title)

                }
            })

        }
    </script>

<script type="text/javascript">
      
    google.charts.load('current', {
        'packages': ['corechart']
    });


    google.charts.setOnLoadCallback(drawMonthlyChart2);
    function drawMonthlyChart2(chart_data, chart_main_title) {
        let jsonData = chart_data;
       
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Months');
        data.addColumn('number', 'Count');
        $.each(jsonData, (i, jsonData) => {
            let name = jsonData.name;
            let count = parseFloat($.trim(jsonData.count));
            data.addRows([
                [name, count]

            ]);
        })

        var options = {
            title: chart_main_title,
            hAxis: {
                title: 'Parties'
            },
            vAxis: {
                title: ''
            },
            colors: ['#007bff'],
            chartArea: {
                width: '80%',
                height: '70%'
            }
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div23'));
        chart.draw(data, options);
    }

    function load_monthly_data2(area, title) {
        const temp_title = title + ' ' + area;
        var _token = $("input[name='_token']").val();
        $.ajax({
            url: 'chart/fetch_data/province',
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                area: area
            },

            dataType: 'json',

            success: function(data) {

                drawMonthlyChart2(data, temp_title)

            }
        })

    }
</script>



@endpush
