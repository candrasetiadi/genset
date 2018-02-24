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

                                    <button type="button" class="btn btn-primary" data-action="add" data-toggle="modal" data-target="#primaryModal" data="">
                                        <i class="fa fa-plus"></i> Add
                                    </button>

                                    <table class="stripe hover mdl-data-table" id="settable" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th width="15%">Tanggal</th>
                                                <th width="30%">Solar Masuk</th>
                                                <th width="30%">Solar Keluar</th>
                                                <th width="30%">Stock Solar</th>
                                                <th width="25%">Dibuat Oleh</th>
                                                <th width="5%">Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr></tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach ($fuelStocks as $fuelStock)
                                                <tr>
                                                    <td>{{ $fuelStock->date }}</td>
                                                    <td>{{ ($fuelStock->solar_in != null) ? $fuelStock->solar_in : 0 }} Liter</td>
                                                    <td>{{ ($fuelStock->solar_out != null) ? $fuelStock->solar_out : 0 }} Liter</td>
                                                    <td>{{ $fuelStock->last_stock }} Liter</td>
                                                    <td>{{ $fuelStock->created_by }}</td>
                                                    <td>
                                                        <!-- 
                                                        <a href="" data-action="edit" data-id="{{ $fuelStock->id }}" data-toggle="modal" data-target="#primaryModal" title="Edit" class="edit"><span class="badge badge-warning"><i class="fa fa-edit"></i></span></a>
                                                        <a href="{{ route('fuelStock.delete', $fuelStock->id) }}" title="Delete"><span class="badge badge-danger"><i class="fa fa-times"></i></span></a> -->

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
                    <form class="form" method="POST" action="{{ url('admin/fuelStock') }}">
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Data</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">

                        <!-- {{method_field("PATCH")}} -->
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="form-control-label" for="date">Tanggal</label>
                            <div class="controls">
                                <div class="input-group">
                                    <input id="date" class="form-control datetimepickers" type="text" name="date" value="" required>
                                    <input type="hidden" name="id" id="id" value="">
                                    <input type="hidden" name="_method" id="method" value="POST">
                                    <input type="hidden" name="created_by" value="{{ Auth::user()->id }}">
                                </div>
                            </div>
                        </div>                 
                        <div class="form-group">
                            <label class="form-control-label" for="solar_in">Jumlah Solar Masuk (Liter)</label>
                            <div class="controls">
                                <div class="input-group">
                                    <input id="solar_in" class="form-control" type="text" name="solar_in" required>
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

        $('#settable').DataTable({
            fixedHeader: true,
            scrollY: 500,
            columnDefs: [
                {
                    targets: [ 0, 1, 2 ],
                    className: 'mdl-data-table__cell--non-numeric',
                    
                }
            ]
        });

        $('#primaryModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
                recipient = button.data('action') 
                _this = button.data('id')

            if ( recipient == 'edit' ) {
                $.ajax({
                    url: "{{URL::to('admin/fuelStock')}}/"+ _this + "/edit",
                    type: 'GET',
                    data: {
                        _method: 'GET',
                        id : _this,
                        _token:     '{{ csrf_token() }}'
                    },
                    success: function(response){

                        console.log(response[0].customer_no)
                        var modal = $(this)
                        $("#date").val(response[0].date)
                        $("#solar_in").val(response[0].solar_in)
                        $("#id").val(response[0].id)
                        $("#method").val("PATCH")

                        $("form").attr("action", "fuelStock/"+ _this)
                    }
                })

            } else {

                $("#date").val("")
                $("#solar_in").val("")
                $("#id").val("")

                $("#method").val("POST")
                $("form").attr("action", "fuelStock")
            }
        })
    });
</script>