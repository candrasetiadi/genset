@extends('layouts.default-login')

@section('content')

    <link rel="icon" type="image/png" sizes="16x16" href="/assets/dashboard/assets/images/favicon.png">
    <link href="/assets/dashboard/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="/assets/dashboard/assets/css/style.css" rel="stylesheet"> -->
    <link href="/assets/dashboard/assets/css/colors/primary.css" id="theme" rel="stylesheet">
    <link href="/assets/dashboard/assets/plugins/morrisjs/morris.css" rel="stylesheet">

    <style type="text/css">
        .text-info {
            color: #1976d2!important;
        }
        .text-success {
            color: #26dad2!important;
        }
        .text-warning {
            color: #ffb22b!important;
        }
    </style>

    <main class="main">

            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item">Admin</li>
                <li class="breadcrumb-item active"><a href="#">Dashboard</a></li>

                <!-- Breadcrumb Menu-->
                <!-- <li class="breadcrumb-menu d-md-down-none">
                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                        <a class="btn btn-secondary" href="#"><i class="icon-speech"></i></a>
                        <a class="btn btn-secondary" href="./"><i class="icon-graph"></i> &nbsp;Dashboard</a>
                        <a class="btn btn-secondary" href="#"><i class="icon-settings"></i> &nbsp;Settings</a>
                    </div>
                </li> -->
            </ol>

            <div class="container-fluid">
        <div class="card-group">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        @if ($count_plugin > 0)
                            <div class="col-12">
                                <h2 class="m-b-0"><i class="mdi mdi-cached text-info"></i></h2>
                                
                                <h3>{{ $plugin[0]->total_cont }} Container </h3>
                            
                                <h6 class="card-subtitle">Plug IN 20"</h6>
                            </div>
                            <div class="col-12">
                                <div class="progress">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <br>
                                <!-- <h6 class="text-info">Target 4.000 Produksi</h6> -->
                            </div>
                        @else
                            <div class="col-12">
                                <h2 class="m-b-0"><i class="mdi mdi-cached text-info"></i></h2>
                                
                                <h3>{{ 0 }} Container </h3>
                            
                                <h6 class="card-subtitle">Plug IN 20"</h6>
                            </div>
                            <div class="col-12">
                                <div class="progress">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 0%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <br>
                                <!-- <h6 class="text-info">Target 4.000 Produksi</h6> -->
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        @if ($count_plugin > 0)
                            <div class="col-12">
                                <h2 class="m-b-0"><i class="mdi mdi-poll-box text-success"></i></h2>
                                <h3>{{ $plugin[1]->total_cont }} Container </h3>
                                <h6 class="card-subtitle">Plug IN 40"</h6></div>
                            <div class="col-12">
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <br>
                                <!-- <h6 class="text-success">80% Target Produksi</h6> -->
                            </div>
                        @else
                            <div class="col-12">
                                <h2 class="m-b-0"><i class="mdi mdi-poll-box text-success"></i></h2>
                                <h3>{{ 0 }} Container </h3>
                                <h6 class="card-subtitle">Plug IN 40"</h6></div>
                            <div class="col-12">
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <br>
                                <!-- <h6 class="text-success">80% Target Produksi</h6> -->
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        @if ($count_plugout > 0)
                            <div class="col-12">
                                <h2 class="m-b-0"><i class="mdi mdi-delete text-warning"></i></h2>
                                <h3 class="">{{ $plugout[0]->total_cont }} Container </h3>
                                <h6 class="card-subtitle">Plug OUT 20"</h6></div>
                            <div class="col-12">
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <br>
                                <!-- <h6 class="text-warning">5.000 Batas Maksimal</h6> -->
                            </div>
                        @else
                            <div class="col-12">
                                <h2 class="m-b-0"><i class="mdi mdi-delete text-warning"></i></h2>
                                <h3 class="">{{ 0 }} Container </h3>
                                <h6 class="card-subtitle">Plug OUT 20"</h6></div>
                            <div class="col-12">
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 0%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <br>
                                <!-- <h6 class="text-warning">5.000 Batas Maksimal</h6> -->
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        @if ($count_plugout > 0)
                            <div class="col-12">
                                <h2 class="m-b-0"><i class="mdi mdi-buffer text-danger"></i></h2>
                                <h3 class="">{{ $plugout[1]->total_cont }} Container </h3>
                                <h6 class="card-subtitle">Plug OUT 40"</h6></div>
                            <div class="col-12">
                                <div class="progress">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <br>
                                <!-- <h6 class="text-danger">12.500 Potensi Produksi</h6> -->
                            </div>
                        @else
                            <div class="col-12">
                                <h2 class="m-b-0"><i class="mdi mdi-buffer text-danger"></i></h2>
                                <h3 class="">{{ 0 }} Container </h3>
                                <h6 class="card-subtitle">Plug OUT 40"</h6></div>
                            <div class="col-12">
                                <div class="progress">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 0%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <br>
                                <!-- <h6 class="text-danger">12.500 Potensi Produksi</h6> -->
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-xlg-9">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex flex-wrap">
                                    <div>
                                        <h4 class="card-title">Solar</h4>
                                    </div>
                                    <div class="ml-auto">
                                        <ul class="list-inline">
                                            <li>
                                                <h6 class="text-muted text-info"><i class="fa fa-circle font-10 m-r-10 "></i>Solar Masuk</h6> </li>
                                            <li>
                                                <h6 class="text-muted text-success"><i class="fa fa-circle font-10 m-r-10"></i>Solar Keluar</h6> </li>
                                            <li>
                                                <h6 class="text-muted text-warning"><i class="fa fa-circle font-10 m-r-10"></i>Stock</h6> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div id="earning" style="height: 355px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-lg-4 col-xlg-3">
              <div class="card card-default">
                          <div class="card-header">
                              <h4 class="card-title m-b-0">User Login</h4>
                          </div>
                          <div class="card-body collapse show">
                          <div id="morris-donut-chart" class="ecomm-donute" style="height: 317px;"></div>
                                <ul class="list-inline text-center">
                                    <li>
                                        <h6 class="text-muted"><i class="fa fa-circle text-danger"></i> {{ $userLogin[0]->name }}</h6>
                                    </li>
                                    <li >
                                        <h6 class="text-muted"><i class="fa fa-circle text-info"></i> {{ $userLogin[1]->name }}</h6>
                                    </li>
                                    <li>
                                        <h6 class="text-muted"> <i class="fa fa-circle text-success"></i> {{ $userLogin[2]->name }}</h6>
                                    </li>
                                </ul>

                          </div>
              </div>
            </div>
        </div>
        
    </div>
        </main>
@endsection
    
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script src="/assets/dashboard/assets/plugins/jquery/jquery.min.js"></script>
    <script src="/assets/dashboard/assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="/assets/dashboard/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="/assets/dashboard/assets/js/jquery.slimscroll.js"></script>
    <script src="/assets/dashboard/assets/js/waves.js"></script>
    <script src="/assets/dashboard/assets/js/sidebarmenu.js"></script>
    <script src="/assets/dashboard/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="/assets/dashboard/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="/assets/dashboard/assets/js/custom.min.js"></script>

    <script src="/assets/dashboard/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
<script src="/assets/dashboard/assets/plugins/raphael/raphael-min.js"></script>
<script src="/assets/dashboard/assets/plugins/morrisjs/morris.min.js"></script>
<script>
$(function() {

    var solars = [],
        solar = <?php echo $solar; ?>

    if (solar != undefined) {
        solars = <?php echo $solar; ?> 
    }

    var labelData = [],
        objects = {}


    $.each( solars, function( idx, val ) {
        labelData.push(
            {
                'tanggal':val.date,
                'keluar': val.solar_out,
                'masuk': val.solar_in,
                'stock': val.last_stock
            }
        )
    })

    if (labelData.length < 1) {
        labelData.push(
            {
                'tanggal':today(),
                'keluar': 0,
                'masuk': 0,
                'stock': 0
            }
        )
    }

    console.log(labelData)

    "use strict";
    Morris.Area({
        element: 'earning',
        data: labelData,
        // data: [{
        //         period: '2011',
        //         Proses: 50,
        //         Hasil: 80,
        //         Buangan: 20
        //     }, {
        //         period: '2012',
        //         Proses: 130,
        //         Hasil: 100,
        //         Buangan: 80
        //     }, {
        //         period: '2013',
        //         Proses: 80,
        //         Hasil: 60,
        //         Buangan: 70
        //     }, {
        //         period: '2014',
        //         Proses: 70,
        //         Hasil: 200,
        //         Buangan: 140
        //     }, {
        //         period: '2015',
        //         Proses: 180,
        //         Hasil: 150,
        //         Buangan: 140
        //     }, {
        //         period: '2016',
        //         Proses: 105,
        //         Hasil: 100,
        //         Buangan: 80
        //     },
        //     {
        //         period: '2017',
        //         Proses: 250,
        //         Hasil: 150,
        //         Buangan: 200
        //     }
        // ],
        xkey: 'tanggal',
        ykeys: ['keluar', 'masuk', 'stock'],
        labels: ['keluar', 'masuk', 'stock'],
        pointSize: 1,
        fillOpacity: 0,
        pointStrokeColors: ['#1976d2', '#26c6da', '#ffb22b'],
        behaveLikeLine: true,
        gridLineColor: '#e0e0e0',
        lineWidth: 3,
        hideHover: 'auto',
        lineColors: ['#1976d2', '#26c6da', '#ffb22b'],
        resize: true

    });

    var users = <?php echo $userLogin; ?>

    Morris.Donut({
        element: 'morris-donut-chart',
        data: [{
            label: users[0].name,
            value: users[0].login_count,

        }, {
            label: users[1].name,
            value: users[1].login_count,
        }, {
            label: users[2].name,
            value: users[2].login_count
        }],
        resize: true,
        colors:['#26c6da', '#1976d2', '#ef5350']
    });


});

function today() {
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();

    if(dd<10) {
        dd = '0'+dd
    } 

    if(mm<10) {
        mm = '0'+mm
    } 

    today = yyyy + '-' + mm + '-' + dd

    return today
}
</script>