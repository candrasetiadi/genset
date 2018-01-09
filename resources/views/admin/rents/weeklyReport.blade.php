@extends('layouts.default-login')

@section('content')
    <main class="main">

            @include('layouts.breadcrumb')

            <div class="container-fluid">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-lg-12">
                            @if(Session::has('flash_message'))
                                <div class="alert alert-success">
                                    {{ Session::get('flash_message') }}
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="card">
                                <div class="card-header">
                                    <i class="fa fa-align-justify"></i> {{ $title }}
                                </div>
                                <div class="card-block">
                                    <form class="form" method="POST" action="{{ url('admin/weeklyReport/exportpdf') }}">
                                        
                                        {{ csrf_field() }}

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="start">Dari</label>
                                                    <div class="controls">
                                                        <div class="input-group">
                                                            <input id="start" class="form-control datetimepickers" type="start" name="start" required>
                                                        </div>
                                                    </div>                         
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="end">Sampai</label>
                                                    <div class="controls">
                                                        <div class="input-group">
                                                            <input id="end" class="form-control datetimepickers" type="end" name="end" required>
                                                        </div>
                                                    </div>                         
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="">&nbsp;</label>
                                                    <div class="controls">
                                                        <div class="input-group">
                                                            <button type="submit" class="btn btn-success printReport" >
                                                                <i class="fa fa-print"></i> Cetak
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

    </div>
@endsection

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    
<script type="text/javascript">
    
    $(document).ready(function() {

        var table = $('#settable').DataTable({
            fixedHeader: true,
            scrollY: 500,
            columnDefs: [
                {
                    targets: [ 0, 1, 2 ],
                    className: 'mdl-data-table__cell--non-numeric'
                }
            ]
        });

        $('#settable').wrap('<div class="dataTables_scroll" />');

        $(document).on('change', '#region_province', function(e){
            e.preventDefault()

            var _this = $(this).val()

            $.ajax({
                url: "{{URL::to('admin/regencies')}}/"+ _this,
                type: 'GET',
                data: {
                    _method: 'GET',
                    id_regencies : _this,
                    _token:     '{{ csrf_token() }}'
                },
                success: function(response){

                    $("#region_regencies").empty().trigger('change')

                    $.each(response, function(idx, val){

                        $("#region_regencies").append('<option value=' + val.id + '>' + val.name + '</option>')
                        $("#region_regencies").select2()
                    })
                }
            })
        })

        // $(document).on('click', '.printReport', function (){
        //     var start = $("#start").val() ,
        //         end = $("#end").val()

        //     window.location.href = 
        // })
    });
</script>