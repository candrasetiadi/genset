@extends('layouts.default-login')

@section('content')
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
                <div class="animated fadeIn">
                    <div class="card-columns cols-2">
                        <div class="card">
                            <!-- <div class="card-header">
                                Jumlah Container Plug In
                                <div class="card-actions">
                                    <a href="http://www.chartjs.org">
                                        <small class="text-muted">docs</small>
                                    </a>
                                </div>
                            </div> -->
                            <div class="card-block">
                                <div class="chart-wrapper">
                                    <canvas id="plugin"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <!-- <div class="card-header">
                                Line Chart
                                <div class="card-actions">
                                    <a href="http://www.chartjs.org">
                                        <small class="text-muted">docs</small>
                                    </a>
                                </div>
                            </div> -->
                            <div class="card-block">
                                <div class="chart-wrapper">
                                    <canvas id="solar"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <!-- <div class="card-header">
                                Jumlah Container Plug Out
                                <div class="card-actions">
                                    <a href="http://www.chartjs.org">
                                        <small class="text-muted">docs</small>
                                    </a>
                                </div>
                            </div> -->
                            <div class="card-block">
                                <div class="chart-wrapper">
                                    <canvas id="plugout"></canvas>
                                </div>
                            </div>
                        </div>   
                        <div class="card">
                            <!-- <div class="card-header">
                                Jumlah Container Plug In
                                <div class="card-actions">
                                    <a href="http://www.chartjs.org">
                                        <small class="text-muted">docs</small>
                                    </a>
                                </div>
                            </div> -->
                            <div class="card-block">
                                <div class="chart-wrapper">
                                    <canvas id="user_perform"></canvas>
                                </div>
                            </div>
                        </div>                     
                    </div>
                </div>
            </div>
        </main>
@endsection
    
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript">
    var plugin = <?php echo $plugin; ?>,
        plugout = <?php echo $plugout; ?>,
        solar = <?php echo $solar; ?>,
        userLogin = <?php echo $userLogin; ?>

    $(document).ready(function(){

        var randomScalingFactor = function(){ return Math.round(Math.random()*100)};

        var plugin1 = 0,
            plugin2 = 0,
            plugout1 = 0,
            plugout2 = 0

        if ( plugin[0] != undefined ) {
            plugin1 = plugin[0].total_cont
        }

        if ( plugout[0] != undefined ) {
            plugout1 = plugout[0].total_cont
        }

        if ( plugin[1] != undefined ) {
            plugin2 = plugin[1].total_cont
        }

        if ( plugout[1] != undefined ) {
            plugout2 = plugout[1].total_cont
        }

        var plugInData = {
            // labels : ['January','February','March','April','May','June','July'],
            labels : ['Hari Ini'],
            datasets : [
                {
                    label : '20',
                    backgroundColor : 'rgba(220,220,220,1)',
                    borderColor : 'rgba(220,220,220,1)',
                    highlightFill: 'rgba(220,220,220,1)',
                    highlightStroke: 'rgba(220,220,220,1)',
                    data : [plugin1]
                },
                {
                    label : '40',
                    backgroundColor : 'rgba(151,187,205,1)',
                    borderColor : 'rgba(151,187,205,1)',
                    highlightFill : 'rgba(151,187,205,1)',
                    highlightStroke : 'rgba(151,187,205,1)',
                    data : [plugin2]
                }
            ]
        }

        var ctx = document.getElementById('plugin');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: plugInData,
            options: {
                responsive: true,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                },
                title: {
                    display: true,
                    text: 'Jumlah Container Plug In'
                }
            }
        });

        var plugOutData = {
            // labels : ['January','February','March','April','May','June','July'],
            labels : ['Hari Ini'],
            datasets : [
                {
                    label : '20',
                    backgroundColor : 'rgba(220,220,220,1)',
                    borderColor : 'rgba(220,220,220,1)',
                    highlightFill: 'rgba(220,220,220,1)',
                    highlightStroke: 'rgba(220,220,220,1)',
                    data : [plugout1]
                },
                {
                    label : '40',
                    backgroundColor : 'rgba(151,187,205,1)',
                    borderColor : 'rgba(151,187,205,1)',
                    highlightFill : 'rgba(151,187,205,1)',
                    highlightStroke : 'rgba(151,187,205,1)',
                    data : [plugout2]
                }
            ]
        }

        var ctx = document.getElementById('plugout');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: plugOutData,
            options: {
                responsive: true,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                },
                title: {
                    display: true,
                    text: 'Jumlah Container Plug Out'
                }
            }
        });

        var solars = []

        if (solar != undefined) {
            solars = <?php echo $solar; ?> 
        }

        var labelData = [],
            valueUsage = []

        $.each( solars, function( idx, val ) {
            labelData.push( val.date )
            valueUsage.push( val.usage )
        })

        var solarData = {
            labels : labelData,
            datasets : [
                {
                    label: '(Liter)',
                    backgroundColor : 'rgba(151,187,205,1)',
                    borderColor : 'rgba(151,187,205,1)',
                    pointBackgroundColor : 'rgba(151,187,205,1)',
                    pointBorderColor : '#fff',
                    data : valueUsage
                }
            ]
        }

        var ctx = document.getElementById('solar');
        var chart = new Chart(ctx, {
            type: 'line',
            data: solarData,
            lineTension: 0.3,
            options: {
                responsive: true,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                },
                title: {
                    display: true,
                    text: 'Jumlah Penggunaan Solar'
                },
                legend: {
                    display: false,
                    position: 'bottom'
                }
            }
        })

        var userLogins = [],
            username = [],
            counts = [],
            color = [],
            dataUser = []

        if (userLogin != undefined) {
            userLogins = <?php echo $userLogin; ?> 
        }

        $.each( userLogins, function( idx, val ) {
            username.push( val.name )
            counts.push( val.login_count )
            color.push( Math.floor(Math.random()*(225-0+50)+100) )
            dataUser.push(
                    {
                        label : val.name,
                        backgroundColor : 'rgba('+color+',220,220,1)',
                        borderColor : 'rgba(220,220,220,1)',
                        highlightFill: 'rgba(220,220,220,1)',
                        highlightStroke: 'rgba(220,220,220,1)',
                        data : val.login_count
                    }
                )
        })

        var userLoginData = {
            // labels : ['January','February','March','April','May','June','July'],
            labels : username,
            datasets : [
                {
                    // label : ['Performa'],
                    // backgroundColor : 'rgba('+color[0]+',220,220,1)',
                    backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderColor : 'rgba(220,220,220,1)',
                    highlightFill: 'rgba(220,220,220,1)',
                    highlightStroke: 'rgba(220,220,220,1)',
                    data : counts
                }
            ]
            
        }

        var ctx = document.getElementById('user_perform');
        var chart = new Chart(ctx, {
            type: 'horizontalBar',
            data: userLoginData,
            options: {
                responsive: true,
                scales: {
                    xAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                },
                title: {
                    display: true,
                    text: 'Performa Petugas (Berdasarkan Login)'
                },
                legend: {
                    display: false,
                    position: 'bottom'
                }
            }
        });
    })


</script>