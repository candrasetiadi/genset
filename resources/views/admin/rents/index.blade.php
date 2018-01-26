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

                                    @if (Auth::user()->id_role != '2')
                                        <button type="button" class="btn btn-primary" data-action="add" data-toggle="modal" data-target="#primaryModal" data="">
                                            <i class="fa fa-plus"></i> Add
                                        </button>
                                    @endif
                                    <table class="stripe hover mdl-data-table" id="settable" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th width="15%">Nomor</th>
                                                <th width="15%">Kapal</th>
                                                <th width="15%">Container</th>
                                                <th width="15%">Lapangan</th>
                                                <th width="10%">Set Point</th>
                                                <th width="15%">Masuk</th>
                                                <th width="15%">Keluar</th>
                                                <th width="10%">Status</th>
                                                <th width="5%">Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr></tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach ($rents as $rent)
                                                <tr>
                                                    <td class="clickRow" data="{{ $rent->id }}">{{ $rent->rent_no }}</td>
                                                    <td class="clickRow" data="{{ $rent->id }}">{{ $rent->ship_name }}</td>
                                                    <td class="clickRow" data="{{ $rent->id }}">{{ $rent->container_name }}</td>
                                                    <td class="clickRow" data="{{ $rent->id }}">{{ $rent->field_name }}</td>
                                                    <td class="clickRow" data="{{ $rent->id }}">{{ $rent->set_point }}</td>
                                                    <td class="clickRow" data="{{ $rent->id }}">{{ date('d-m-Y', strtotime($rent->date_in)) }} {{ $rent->time_in }}</td>
                                                    <td class="clickRow" data="{{ $rent->id }}">{{ $rent->date_out }}</td>
                                                    <td>
                                                        <!-- @if (Auth::user()->id_role != '2')
                                                            <select id="updateStatus" name="updateStatus" class="form-control" placeholder="Please Select" required style="width: 100%;" data="{{ $rent->id }}">

                                                                @foreach ($status as $key => $value)
                                                                    @if ($key == $rent->status)
                                                                        <option value="{{ $key }}" selected>{{ $value }}</option>  
                                                                    @elseif ($key == 'active' || $key == 'inactive')
                                                                        <option value="{{ $key }}" disabled>{{ $value }}</option>
                                                                    @else
                                                                        <option value="{{ $key }}">{{ $value }}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        @else
                                                            {{ $rent->status }}
                                                        @endif -->
                                                        {{ $rent->status }}
                                                    </td>
                                                    <td>
                                                        @if (Auth::user()->id_role != '2')
                                                            <!-- <a href="{{ route('rent.exportpdf', $rent->id) }}" title="Print" target="_blank"><span class="badge badge-success"><i class="fa fa-print"></i></span></a> -->
                                                            @if ($rent->status == 'active')
                                                            <a href="" data-action="edit" data-id="{{ $rent->id }}" data-toggle="modal" data-target="#primaryModal" title="Edit" class="edit"><span class="badge badge-warning"><i class="fa fa-edit"></i></span></a>

                                                            <a href="{{ route('rent.delete', $rent->id) }}" title="Delete"><span class="badge badge-danger"><i class="fa fa-times"></i></span></a>
                                                            @endif
                                                        @endif

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        
        <div class="modal fade" id="primaryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-primary" role="document">
                <div class="modal-content">
                    <form class="form" method="POST" action="{{ url('admin/rent') }}">
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Data</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">

                        <!-- {{method_field("PATCH")}} -->
                        {{ csrf_field() }}

                        <!-- <div class="form-group">
                            <label class="form-control-label" for="rent_no">Nomor</label>
                            <div class="controls">
                                <div class="input-group">
                                    <input id="rent_no" class="form-control"  type="text" name="rent_no">
                                </div>
                            </div>
                        </div> -->

                        <div class="form-group">
                            <label class="form-control-label" for="id_ship">Kapal</label>
                            <div class="controls">
                                <select id="id_ship" name="id_ship" class="form-control" placeholder="Please Select" required style="width: 100%;">
                                    <option value="">&nbsp;</option>
                                    @foreach($ships as $key => $val)
                                        <option value="{{ $val->id }}">{{ $val->name }}</option>
                                    @endforeach
                                   
                                </select>
                                    
                                <input type="hidden" name="id" id="id" value="">
                                <input type="hidden" name="_method" id="method" value="POST">
                                <input type="hidden" name="created_by" value="{{ Auth::user()->id }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label" for="id_container">Container</label>
                            <div class="controls">
                                <select id="id_container" name="id_container" class="form-control" placeholder="Please Select" required style="width: 100%;">
                                    <option value="">&nbsp;</option>                                   
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label" for="delivery_type">Tipe Pengiriman</label>
                            <div class="controls">
                                <select id="delivery_type" name="delivery_type" class="form-control" placeholder="Please Select" required style="width: 100%;">
                                    <option value="">&nbsp;</option>
                                    <option value="export">Export</option>
                                    <option value="import">Import</option>
                                   
                                </select>
                            </div>
                        </div>

                        <h5>Data Recooling & Monitoring</h5>                       
                        <div class="form-group">
                            <label class="form-control-label" for="date_in">Tanggal Masuk</label>
                            <div class="controls">
                                <div class="input-group">
                                    <input id="date_in" class="form-control datetimepickers" type="date_in" name="date_in" required>
                                </div>
                            </div>                         
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="time_in">Jam Masuk</label>
                            <div class="controls">
                                <div class="input-group">
                                    <input id="time_in" class="form-control timepickers" type="time_in" name="time_in" required>
                                </div>
                            </div>                         
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="set_point">Set Point</label>
                            <div class="controls">
                                <div class="input-group">
                                    <input id="set_point" class="form-control"  type="text" name="set_point" required>
                                </div>
                            </div>
                        </div>    
                        <div class="form-group">
                            <label class="form-control-label" for="set_point">Diinput Oleh</label>
                            <div class="controls">
                                <div class="input-group">
                                    <input id="input_by" class="form-control"  type="text" name="input_by" value="{{ Auth::user()->name }}" disabled>
                                </div>
                            </div>
                        </div>                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
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


        $('#primaryModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
                recipient = button.data('action') 
                _this = button.data('id')

            if ( recipient == 'edit' ) {
                $.ajax({
                    url: "{{URL::to('admin/rent')}}/"+ _this + "/edit",
                    type: 'GET',
                    data: {
                        _method: 'GET',
                        id : _this,
                        _token:     '{{ csrf_token() }}'
                    },
                    success: function(response){

                        console.log(response[0].customer_no)
                        var modal = $(this)
                        $("#id_ship").val(response[0].id_ship).trigger('change')
                        $("#id_container").val(response[0].id_container).trigger('change')
                        $("#delivery_type").val(response[0].delivery_type).trigger('change')
                        $("#time_in").val(response[0].time_in)
                        $("#date_in").val(response[0].date_in)
                        $("#set_point").val(response[0].set_point)
                        $("#id").val(response[0].id)
                        $("#method").val("PATCH")

                        $("form").attr("action", "rent/"+ _this)
                    }
                })

            } else {

                $("#id_ship").val("")
                $("#id_container").val("")
                $("#delivery_type").val("")
                $("#time_in").val("")
                $("#date_in").val("")
                $("#set_point").val("")
                $("#id").val("")
            }
        })

        $(document).on('change', '#id_ship', function(e){
            e.preventDefault()

            var _this = $(this).val()

            $.ajax({
                url: "{{URL::to('admin/container')}}/"+ _this + "/get",
                type: 'GET',
                data: {
                    _method: 'GET',
                    id_ship : _this,
                    _token:     '{{ csrf_token() }}'
                },
                success: function(response){

                    $("#id_container").empty().trigger('change')

                    $.each(response, function(idx, val){

                        $("#id_container").append('<option value=' + val.id + '>' + val.name + '</option>')
                        $("#id_container").select2()
                    })
                }
            })
        })

        $(document).on('change', '#updateStatus', function(e){
            e.preventDefault()

            var _this = $(this).val(),
                id = $(this).attr('data')

            $.ajax({
                url: "{{URL::to('admin/rent')}}/"+ _this + "/setStatus",
                type: 'GET',
                data: {
                    _method: 'GET',
                    status : _this,
                    id:id,
                    _token:     '{{ csrf_token() }}'
                },
                success: function(response){

                    location.reload();
                }
            })
        })

        $('#settable').on('click', 'tbody td.clickRow', function() {
            var _this = $(this).attr('data')
            window.location.href = "{{ URL::to('admin/rent') }}/" + _this
        })
    });
</script>