<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,AngularJS,Angular,Angular2,Angular 2,Angular4,Angular 4,jQuery,CSS,HTML,RWD,Dashboard,React,React.js,Vue,Vue.js">

    <meta name="csrf-token" content="{{ csrf_token() }}" />
    
    <link rel="shortcut icon" href="img/favicon.png">

    <title>e-genset</title>

    <!-- Icons -->
    <link href="/assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="/assets/css/simple-line-icons.css" rel="stylesheet">

    <!-- Main styles for this application -->
    <!-- <link href="/assets/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="/assets/css/style.css" rel="stylesheet">
    <link href="/assets/datatables/datatables.net-jqui/css/dataTables.jqueryui.css" rel="stylesheet">
    <link href="/assets/datatables/datatables.net-autofill-jqui/css/autoFill.jqueryui.css" rel="stylesheet">
    <link href="/assets/datatables/datatables.net-responsive-jqui/css/responsive.jqueryui.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- <link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" rel="stylesheet"> -->

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <link href="/assets/css/select2.css" rel="stylesheet">
    
    <link href="/assets/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <link href="/assets/css/bootstrap-datetimepicker-standalone.css" rel="stylesheet">

</head>
    @include('layouts.header')

    <div class="app-body">
        @include('layouts.sidebar')

        @yield('content')
    </div>

    @include('layouts.footer')
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->

    <!-- Bootstrap and necessary plugins -->
    <script src="/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="/bower_components/tether/dist/js/tether.min.js"></script>
    <script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/bower_components/pace/pace.min.js"></script>


    <!-- Plugins and scripts required by all views -->
    <!-- <script src="/bower_components/chart.js/dist/Chart.min.js"></script> -->
    <!-- <script src="/assets/js/views/charts.js"></script> -->
    <!-- <script src="/assets/js/views/main.js"></script> -->

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="/assets/datatables/jquery/dist/jquery.js"></script>
    <script src="/assets/datatables/jquery/dist/jquery.min.js"></script> -->

    <!-- GenesisUI main scripts -->

    <script src="/assets/js/views/app.js"></script>

    <!-- Plugins and scripts required by this views -->

    <!-- Custom scripts required by this view -->
    <script src="/assets/datatables/datatables.net/js/jquery.dataTables.js"></script>
    <script src="/assets/datatables/datatables.net-jqui/js/dataTables.jqueryui.js"></script>
    <script src="/assets/datatables/datatables.net-jqui/js/dataTables.jqueryui.js"></script>
    <script src="/assets/datatables/datatables.net-autofill/js/dataTables.autoFill.js"></script>
    <script src="/assets/datatables/datatables.net-autofill-jqui/js/autoFill.jqueryui.js"></script>
    <script src="/assets/datatables/datatables.net-responsive/js/dataTables.responsive.js"></script>
    <script src="/assets/datatables/datatables.net-responsive-jqui/js/responsive.jqueryui.js"></script>
    <script src="/assets/js/views/moment-with-locales.min.js"></script>
    <script src="/assets/js/views/select2.js"></script>
    
    <script src="/assets/js/views/bootstrap-datetimepicker.min.js"></script>

