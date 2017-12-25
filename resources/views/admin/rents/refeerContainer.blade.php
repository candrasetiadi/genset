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
                                    <form class="form" method="POST" action="{{ url('admin/rent/exportpdf') }}">
                                        
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
                                                    <label class="form-control-label" for="id_field">Lapangan</label>
                                                    <div class="controls">
                                                        <select id="id_field" name="id_field" class="form-control" placeholder="Please Select" required>
                                                            <option value="">&nbsp;</option>
                                                            @foreach($fields as $key => $val)
                                                                <option value="{{ $val->id }}">{{ $val->name }}</option>
                                                            @endforeach
                                                           
                                                        </select>
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

                                    

                                    <!-- <table class="stripe hover mdl-data-table" id="settable" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th width="5%">Nomor</th>
                                                <th width="10%">Container</th>
                                                <th width="5%">Ukuran</th>
                                                <th width="10%">Tanggal Plug In</th>
                                                <th width="10%">Jumlah Shift(Pembulatan)</th>
                                                <th width="10%">Export/Import</th>
                                                <th width="10%">Set Point</th>
                                                <th width="10%">Kapal</th>
                                                <th width="10%">Recooling</th>
                                                <th width="10%">Monitoring</th>
                                                <th width="10%">Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr></tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach ($data as $key => $val)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $val->container_no }} {{ $val->name }}</td>
                                                    <td>{{ $val->size }}</td>
                                                    <td>{{ date('d-m-Y', strtotime($val->date_in)) }} {{ $val->time_in }}</td>
                                                    <td>{{ $val->total_shift }}</td>
                                                    <td>{{ $val->delivery_type }}</td>
                                                    <td>{{ $val->set_point }}</td>
                                                    <td>{{ $val->ship_name }}</td>
                                                    <td align="right">Rp. {{ number_format($val->recooling_price,0,',','.') }}</td>
                                                    <td align="right">Rp. {{ number_format($val->monitoring_price,0,',','.') }}</td>
                                                    <td align="right">Rp. {{ number_format(($val->total_shift * $val->recooling_price) + ($val->total_shift * $val->monitoring_price),0,',','.') }}</td>
                                                    
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table> -->
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