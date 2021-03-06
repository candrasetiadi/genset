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

                                    <!-- <a href="{{ url('admin/invoice/create') }}"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Add</button></a> -->

                                    <button type="button" class="btn btn-primary" data-action="add" data-toggle="modal" data-target="#primaryModal" data="">
                                        <i class="fa fa-plus"></i> Add
                                    </button>

                                    <table class="stripe hover mdl-data-table" id="settable" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th width="35%">Nomor</th>
                                                <th width="35%">Periode</th>
                                                <th width="25%">Customer</th>
                                                <th width="25%">Long Stay</th>
                                                <th width="25%">Status</th>
                                                <th width="5%">Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr></tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach ($invoices as $invoice)
                                                <tr>
                                                    <td>{{ $invoice->invoice_no }}</td>
                                                    <td>{{ date('d M Y', strtotime($invoice->start_date)) }} s/d {{ date('d M Y', strtotime($invoice->end_date)) }}</td>
                                                    <td>{{ $invoice->customer_name }}</td>
                                                    <td>
                                                        @if ($invoice->warning)
                                                            <span class="badge badge-danger"><i class="fa fa-times"></i></span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <select id="updateStatus" name="updateStatus" class="form-control" placeholder="Please Select" required style="width: 100%;" data="{{ $invoice->id }}">
                                                            @foreach ($status as $key => $value)
                                                                @if ($key == $invoice->status)
                                                                    
                                                                    <option value="{{ $key }}" selected>{{ $value }}</option>
                                                                @else
                                                                    <option value="{{ $key }}">{{ $value }}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('invoice.exportpdf', $invoice->id) }}" title="Print" target="_blank"><span class="badge badge-success"><i class="fa fa-print"></i></span></a>
                                                        <!-- <a href="" data-action="edit" data-id="{{ $invoice->id }}" data-toggle="modal" data-target="#primaryModal" title="Edit" class="edit"><span class="badge badge-warning"><i class="fa fa-edit"></i></span></a> -->
                                                        <!-- <a href="{{ route('invoice.delete', $invoice->id) }}" title="Delete"><span class="badge badge-danger"><i class="fa fa-times"></i></span></a> -->

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
                    <form class="form" method="POST" action="{{ url('admin/invoice') }}">
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
                            <label class="form-control-label" for="id_customer">Customer</label>
                            <div class="controls">
                                <select id="id_customer" name="id_customer" class="form-control" placeholder="Please Select" required style="width: 100%;">
                                    <option value="">&nbsp;</option>
                                    @foreach($customers as $key => $val)
                                        <option value="{{ $val->id }}">{{ $val->name }}</option>
                                    @endforeach
                                   
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="tax_invoice">Faktur Pajak</label>
                            <div class="controls">
                                <div class="input-group">
                                    <input id="tax_invoice" class="form-control"  type="text" name="tax_invoice">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="start_date">Periode 1</label>
                            <div class="controls">
                                <div class="input-group">
                                    <input id="start_date" class="form-control datetimepickers" type="text" name="start_date" value="" required>
                                    <input type="hidden" name="id" id="id" value="">
                                    <input type="hidden" name="_method" id="method" value="POST">
                                </div>
                            </div>
                        </div>                        
                        <div class="form-group">
                            <label class="form-control-label" for="end_date">Periode 2</label>
                            <div class="controls">
                                <div class="input-group">
                                    <input id="end_date" class="form-control datetimepickers" type="text" name="end_date" required>
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

        var status = $("#updateStatus").val()

        if (status == 'paid') {
            $("#updateStatus").prop("disabled", true)
        } else {
            $("#updateStatus").prop("disabled", false)
        }

        $('#settable').DataTable({

            "createdRow": function( row, data, dataIndex){
                
                if( data[3] == true ){
                    $(row).css({"background-color":"yellow"})
                }
            },

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
                    url: "{{URL::to('admin/invoice')}}/"+ _this + "/edit",
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
                        $("#id_customer").val(response[0].id_customer).trigger('change')
                        $("#start_date").val(response[0].start_date)
                        $("#end_date").val(response[0].end_date)
                        $("#id").val(response[0].id)
                        $("#method").val("PATCH")

                        $("form").attr("action", "invoice/"+ _this)
                    }
                })

            } else {

                $("#id_field").val("")
                $("#id_customer").val("")
                $("#start_date").val("")
                $("#end_date").val("")
                $("#id").val("")
            }
        })

        $(document).on('change', '#updateStatus', function(e){
            e.preventDefault()

            var _this = $(this).val(),
                id = $(this).attr('data')

            $.ajax({
                url: "{{URL::to('admin/invoice')}}/"+ _this + "/setStatus",
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
    });
</script>