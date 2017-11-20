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
                                                <th width="25%">Nomor</th>
                                                <th width="20%">Nama</th>
                                                <th width="15%">Merek</th>
                                                <th width="20%">Tipe</th>
                                                <th width="15%">Kapasitas Solar</th>
                                                <th width="5%">Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr></tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach ($generators as $generator)
                                                <tr>
                                                    <td>{{ $generator->generator_no }}</td>
                                                    <td>{{ $generator->name }}</td>
                                                    <td>{{ $generator->brand }}</td>
                                                    <td>{{ $generator->type }}</td>
                                                    <td>{{ $generator->diesel_fuel_capacity }}</td>
                                                    <td>
                                                        
                                                        <a href="" data-action="edit" data-id="{{ $generator->id }}" data-toggle="modal" data-target="#primaryModal" title="Edit" class="edit"><span class="badge badge-warning"><i class="fa fa-edit"></i></span></a>
                                                        <a href="{{ route('generator.delete', $generator->id) }}" title="Delete"><span class="badge badge-danger"><i class="fa fa-times"></i></span></a>

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
                    <form class="form" method="POST" action="{{ url('admin/generator') }}">
                        <div class="modal-header">
                            <h4 class="modal-title">Add New Generator</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">

                        <!-- {{method_field("PATCH")}} -->
                        {{ csrf_field() }}
                        
                        <div class="form-group">
                            <label class="form-control-label" for="generator_no">Nomor Generator</label>
                            <div class="controls">
                                <div class="input-group">
                                    <input id="generator_no" class="form-control" type="text" name="generator_no" value="" required>
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
                            <label class="form-control-label" for="brand">Merek</label>
                            <div class="controls">
                                <div class="input-group">
                                    <input id="brand" class="form-control"  type="text" name="brand" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="type">Tipe</label>
                            <div class="controls">
                                <div class="input-group">
                                    <input id="type" class="form-control"  type="text" name="type" required>
                                </div>
                            </div>                                   
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="diesel_fuel_capacity">Kapasitas Solar</label>
                            <div class="controls">
                                <div class="input-group">
                                    <input id="diesel_fuel_capacity" class="form-control"  type="text" name="diesel_fuel_capacity" required>
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
                    url: "{{URL::to('admin/generator')}}/"+ _this + "/edit",
                    type: 'GET',
                    data: {
                        _method: 'GET',
                        id : _this,
                        _token:     '{{ csrf_token() }}'
                    },
                    success: function(response){

                        console.log(response[0].customer_no)
                        var modal = $(this)
                        $("#generator_no").val(response[0].generator_no)
                        $("#name").val(response[0].name)
                        $("#brand").val(response[0].brand)
                        $("#type").val(response[0].type)
                        $("#diesel_fuel_capacity").val(response[0].diesel_fuel_capacity)
                        $("#id").val(response[0].id)
                        $("#method").val("PATCH")

                        $("form").attr("action", "generator/"+ _this)
                    }
                })

            } else {

                $("#generator_no").val("")
                $("#name").val("")
                $("#brand").val("")
                $("#type").val("")
                $("#diesel_fuel_capacity").val("")
                $("#id").val("")
            }
        })
    });
</script>