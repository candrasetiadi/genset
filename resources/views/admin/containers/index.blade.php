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
                                                <th width="15%">Nomor</th>
                                                <th width="15%">Nama</th>
                                                <th width="10%">Ukuran</th>
                                                <th width="15%">Lapangan</th>
                                                <th width="15%">Kapal</th>
                                                <th width="10%">Harga Recooling</th>
                                                <th width="10%">Harga Monitoring</th>
                                                <th width="5%">Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr></tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach ($containers as $container)
                                                <tr>
                                                    <td>{{ $container->container_no }}</td>
                                                    <td>{{ $container->name }}</td>
                                                    <td>{{ $container->size }}</td>
                                                    <td>{{ $container->field_name }}</td>
                                                    <td>{{ $container->ship_name }}</td>
                                                    <td align="right">Rp. {{ number_format($container->recooling_price,0,',','.') }}</td>
                                                    <td align="right">Rp. {{ number_format($container->monitoring_price,0,',','.') }}</td>
                                                    <td>
                                                        
                                                        <a href="" data-action="edit" data-id="{{ $container->id }}" data-toggle="modal" data-target="#primaryModal" title="Edit" class="edit"><span class="badge badge-warning"><i class="fa fa-edit"></i></span></a>
                                                        <a href="" data="{{ $container->id }}" id="deleteRow" data-base="container" title="Delete"><span class="badge badge-danger"><i class="fa fa-times"></i></span></a>

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
                    <form class="form" method="POST" action="{{ url('admin/container') }}">
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Data Container</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">

                        {{ csrf_field() }}
                        
                        <div class="form-group">
                            <label class="form-control-label" for="container_no">Nomor Container</label>
                            <div class="controls">
                                <div class="input-group">
                                    <input id="container_no" class="form-control" type="text" name="container_no" maxlength="11" value="" required>

                                    <input type="hidden" name="id" id="id" value="">
                                    <input type="hidden" name="_method" id="method" value="POST">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="name">Nama</label>
                            <div class="controls">
                                <div class="input-group">
                                    <input id="name" class="form-control" type="name" name="name" required>
                                </div>
                            </div>                         
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="size">Ukuran</label>
                            <div class="controls">
                                <select id="size" name="size" class="form-control" placeholder="Please Select" required style="width: 100%;">
                                    <option value="">&nbsp;</option>
                                    <option value="20">20</option>
                                    <option value="40">40</option>
                                   
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="id_field">Nama Lapangan</label>
                            <div class="controls">
                                <select id="id_field" name="id_field" class="form-control" placeholder="Please Select" required style="width: 100%;">
                                    <option value="">&nbsp;</option>
                                    @foreach($fields as $key => $val)
                                        <option value="{{ $val->id }}">{{ $val->name }}</option>
                                    @endforeach
                                   
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="id_ship">Nomor Kapal</label>
                            <div class="controls">
                                <select id="id_ship" name="id_ship" class="form-control" placeholder="Please Select" required style="width: 100%;">
                                    <option value="">&nbsp;</option>
                                    @foreach($ships as $key => $val)
                                        <option value="{{ $val->id }}">{{ $val->ship_no }}</option>
                                    @endforeach
                                   
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="recooling_price">Harga Recooling (Rp)</label>
                            <div class="controls">
                                <div class="input-group">
                                    <input id="recooling_price" class="form-control"  type="text" name="recooling_price" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="monitoring_price">Harga Monitoring (Rp)</label>
                            <div class="controls">
                                <div class="input-group">
                                    <input id="monitoring_price" class="form-control"  type="text" name="monitoring_price" required>
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
                    className: 'mdl-data-table__cell--non-numeric'
                }
            ]
        });

        $('#primaryModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
                recipient = button.data('action') 
                _this = button.data('id')

            if ( recipient == 'edit' ) {
                $.ajax({
                    url: "{{URL::to('admin/container')}}/"+ _this + "/edit",
                    type: 'GET',
                    data: {
                        _method: 'GET',
                        id : _this,
                        _token:     '{{ csrf_token() }}'
                    },
                    success: function(response){

                        console.log(response[0].customer_no)
                        var modal = $(this)
                        $("#container_no").val(response[0].container_no)
                        $("#name").val(response[0].name)
                        $("#size").val(response[0].size).trigger('change')
                        $("#id_field").val(response[0].id_field).trigger('change')
                        $("#id_ship").val(response[0].id_ship).trigger('change')
                        $("#recooling_price").val(response[0].recooling_price)
                        $("#monitoring_price").val(response[0].monitoring_price)
                        $("#id").val(response[0].id)
                        $("#method").val("PATCH")

                        $("form").attr("action", "container/"+ _this)
                    }
                })

            } else {

                $("#container_no").val("")
                $("#name").val("")
                $("#size").val("")
                $("#id_field").val("")
                $("#id_ship").val("")
                $("#recooling_price").val("")
                $("#monitoring_price").val("")
                $("#id").val("")
            }
        })
    });
</script>