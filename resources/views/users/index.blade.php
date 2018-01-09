@extends('layouts.default-login')

@section('content')
    <main class="main">

            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item"><a href="#">Admin</a>
                </li>
                <li class="breadcrumb-item active">Users</li>

                <!-- Breadcrumb Menu-->
                <!-- <li class="breadcrumb-menu d-md-down-none">
                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                        <a class="btn btn-secondary" href="#"><i class="icon-speech"></i></a>
                        <a class="btn btn-secondary" href="./"><i class="icon-graph"></i> &nbsp;Dashboard</a>
                        <a class="btn btn-secondary" href="#"><i class="icon-settings"></i> &nbsp;Settings</a>
                    </div>
                </li> -->
            </ol>
            
            <div class="container-fluid">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <i class="fa fa-align-justify"></i> Users
                                </div>
                                <div class="card-block">
                                    <table class="stripe hover mdl-data-table" id="settable" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Tanggal Daftar</th>
                                                <th>Role</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr></tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->created_at }}</td>
                                                    <td><span class="badge badge-success">{{ $user->role_name }}</span></td>
                                                    <td>
                                                        <a href="" data-action="editRole" data-id="{{ $user->id }}" data-toggle="modal" data-target="#primaryModal" title="Edit Role" class="edit"><span class="badge badge-warning"><i class="fa fa-edit"></i></span></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <!-- <nav>
                                        <ul class="pagination">
                                            <li class="page-item"><a class="page-link" href="#">Prev</a>
                                            </li>
                                            <li class="page-item active">
                                                <a class="page-link" href="#">1</a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">2</a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">3</a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">4</a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">Next</a>
                                            </li>
                                        </ul>
                                    </nav> -->
                                </div>
                            </div>
                        </div>
                        <!--/.col-->
                    </div>
                </div>
            </div>
        </main>
        <div class="modal fade" id="primaryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-primary" role="document">
                <div class="modal-content">
                    <form class="form" method="POST" action="{{ url('admin/users/role') }}">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Role</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">

                        {{method_field("PATCH")}}
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label class="form-control-label" for="role_id">Role</label>
                            <div class="controls">
                                <select id="role_id" name="role_id" class="form-control" placeholder="Please Select" required>
                                    <option value="0">&nbsp;</option>
                                    @foreach($roles as $key => $val)
                                        <option value="{{ $val->id }}">{{ $val->name }}</option>
                                    @endforeach
                                   
                                </select>
                                <input type="hidden" name="user_id" value="" id="user_id">
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
@endsection

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    
<script type="text/javascript">
    
    $(document).ready(function() {
        $('#settable').DataTable({
            columnDefs: [
                {
                    targets: [ 0, 1, 2 ],
                    className: 'mdl-data-table__cell--non-numeric'
                }
            ]
        })

        $('#primaryModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
                recipient = button.data('action') 
                _this = button.data('id')

            if ( recipient == 'editRole' ) {
                $.ajax({
                    url: "{{URL::to('admin/users/role')}}/"+ _this + "/edit",
                    type: 'GET',
                    data: {
                        _method: 'GET',
                        id : _this,
                        _token:     '{{ csrf_token() }}'
                    },
                    success: function(response){

                        console.log(response[0])
                        var modal = $(this)
                        if( response[0].id != undefined ) {
                            $("#role_id").val(response[0].id).trigger('change')
                        } else {
                            $("#role_id").val().trigger('change')
                        }
                        $("#user_id").val(_this)
                        $("#method").val("PATCH")

                        $("form").attr("action", "users/role/"+ _this + "/update")
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
            }
        })

    } )
</script>