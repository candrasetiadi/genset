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
                                                <th width="20%">Nomor</th>
                                                <th width="25%">Nama</th>
                                                <th width="25%">Email</th>
                                                <th width="10%">Telepon</th>
                                                <th width="15%">PIC</th>
                                                <th width="5%">Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr></tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach ($customers as $customer)
                                                <tr>
                                                    <td>{{ $customer->customer_no }}</td>
                                                    <td>{{ $customer->name }}</td>
                                                    <td>{{ $customer->email }}</td>
                                                    <td>{{ $customer->phone_1 }}</td>
                                                    <td>{{ $customer->pic }}</td>
                                                    <td>
                                                        
                                                        <a href="" data-action="edit" data-id="{{ $customer->id }}" data-toggle="modal" data-target="#primaryModal" title="Edit" class="edit"><span class="badge badge-warning"><i class="fa fa-edit"></i></span></a>
                                                        <a href="{{ route('customer.delete', $customer->id) }}" title="Delete"><span class="badge badge-danger"><i class="fa fa-times"></i></span></a>

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
                    <form class="form" method="POST" action="{{ url('admin/customer') }}">
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Customer</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">

                        <!-- {{method_field("PATCH")}} -->
                        {{ csrf_field() }}
                        
                        <div class="form-group">
                            <label class="form-control-label" for="customer_no">Customer No</label>
                            <div class="controls">
                                <div class="input-group">
                                    <input id="customer_no" class="form-control" type="text" name="customer_no" value="" required>
                                    <input type="hidden" name="id" id="id" value="">
                                    <input type="hidden" name="_method" id="method" value="POST">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="email">Email</label>
                            <div class="controls">
                                <div class="input-group">
                                    <input id="email" class="form-control" type="email" name="email" required>
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
                            <label class="form-control-label" for="phone_1">Telepon 1</label>
                            <div class="controls">
                                <div class="input-group">
                                    <input id="phone_1" class="form-control"  type="text" name="phone_1" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="phone_2">Telepon 2</label>
                            <div class="controls">
                                <div class="input-group">
                                    <input id="phone_2" class="form-control"  type="text" name="phone_2">
                                </div>
                            </div>                                   
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="pic">PIC</label>
                            <div class="controls">
                                <div class="input-group">
                                    <input id="pic" class="form-control"  type="text" name="pic" required>
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
                    url: "{{URL::to('admin/customer')}}/"+ _this + "/edit",
                    type: 'GET',
                    data: {
                        _method: 'GET',
                        id : _this,
                        _token:     '{{ csrf_token() }}'
                    },
                    success: function(response){

                        console.log(response[0].customer_no)
                        var modal = $(this)
                        $("#customer_no").val(response[0].customer_no)
                        $("#email").val(response[0].email)
                        $("#name").val(response[0].name)
                        $("#phone_1").val(response[0].phone_1)
                        $("#phone_2").val(response[0].phone_2)
                        $("#pic").val(response[0].pic)
                        $("#id").val(response[0].id)
                        $("#method").val("PATCH")

                        $("form").attr("action", "customer/"+ _this)
                    }
                })

            } else {

                $("#customer_no").val("")
                $("#email").val("")
                $("#name").val("")
                $("#phone_1").val("")
                $("#phone_2").val("")
                $("#pic").val("")
                $("#id").val("")
            }
        })
    });
</script>