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
                                                <th width="30%">Lapangan</th>
                                                <th width="25%">Generator</th>
                                                <th width="25%">Jumlah Pemakaian</th>
                                                <th width="5%">Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr></tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach ($fuelUsages as $fuelUsage)
                                                <tr>
                                                    <td>{{ $fuelUsage->date }}</td>
                                                    <td>{{ $fuelUsage->field_name }}</td>
                                                    <td>{{ $fuelUsage->generator_name }}</td>
                                                    <td>{{ $fuelUsage->usage }} Liter</td>
                                                    <td>
                                                        <a href="{{ route('fuelUsage.exportpdf', $fuelUsage->id) }}" title="Print" target="_blank"><span class="badge badge-success"><i class="fa fa-print"></i></span></a>
                                                        <a href="" data-action="edit" data-id="{{ $fuelUsage->id }}" data-toggle="modal" data-target="#primaryModal" title="Edit" class="edit"><span class="badge badge-warning"><i class="fa fa-edit"></i></span></a>
                                                        <a href="{{ route('fuelUsage.delete', $fuelUsage->id) }}" title="Delete"><span class="badge badge-danger"><i class="fa fa-times"></i></span></a>

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
                    <form class="form" method="POST" action="{{ url('admin/fuelUsage') }}">
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
                            <label class="form-control-label" for="id_field">Lapangan</label>
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
                            <label class="form-control-label" for="id_generator">Generator</label>
                            <div class="controls">
                                <select id="id_generator" name="id_generator" class="form-control" placeholder="Please Select" required style="width: 100%;">
                                    <option value="">&nbsp;</option>
                                    @foreach($generators as $key => $val)
                                        <option value="{{ $val->id }}">{{ $val->name }}</option>
                                    @endforeach
                                   
                                </select>
                            </div>
                        </div>   
                        <div class="form-group">
                            <label class="form-control-label" for="stock">Jumlah Stock</label>
                            <div class="controls">
                                <div class="input-group">
                                    <input id="stock" class="form-control" type="text" name="stock" disabled value="{{ $fuelStocks->last_stock }} Liter">
                                </div>
                            </div>                         
                        </div>                      
                        <div class="form-group">
                            <label class="form-control-label" for="usage">Jumlah Pemakaian</label>
                            <div class="controls">
                                <div class="input-group">
                                    <input id="usage" class="form-control" type="text" name="usage" >
                                </div>
                            </div>                         
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="field_operator">Petugas Lapangan</label>
                            <div class="controls">
                                <div class="input-group">
                                    <input id="field_operator" class="form-control"  type="text" name="field_operator" required>
                                </div>
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="form-control-label" for="unit_operator">Operator Unit</label>
                            <div class="controls">
                                <div class="input-group">
                                    <input id="unit_operator" class="form-control"  type="text" name="unit_operator" required>
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
                    url: "{{URL::to('admin/fuelUsage')}}/"+ _this + "/edit",
                    type: 'GET',
                    data: {
                        _method: 'GET',
                        id : _this,
                        _token:     '{{ csrf_token() }}'
                    },
                    success: function(response){

                        console.log(response[0].customer_no)
                        var modal = $(this)
                        $("#id_field").val(response[0].id_field).trigger('change')
                        $("#date").val(response[0].date)
                        $("#id_generator").val(response[0].id_generator).trigger('change')
                        $("#usage").val(response[0].usage)
                        $("#field_operator").val(response[0].field_operator)
                        $("#unit_operator").val(response[0].unit_operator)
                        $("#id").val(response[0].id)
                        $("#method").val("PATCH")

                        $("form").attr("action", "fuelUsage/"+ _this)
                    }
                })

            } else {

                $("#id_field").val("")
                $("#date").val("")
                $("#id_generator").val("")
                $("#usage").val("")
                $("#field_operator").val("")
                $("#unit_operator").val("")
                $("#id").val("")

                $("#method").val("POST")
                $("form").attr("action", "fuelUsage")
            }
        })
    });
</script>