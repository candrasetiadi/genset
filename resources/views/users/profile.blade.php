@extends('layouts.default-login')

@section('content')
    <main class="main">

            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item"><a href="#">Admin</a>
                </li>
                <li class="breadcrumb-item active">Profile</li>

            </ol>

            <div class="container-fluid">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <i class="fa fa-align-justify"></i> Profile
                                </div>
                                <div class="card-block row">
                                    <div class="col-sm-6">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                Nama
                                            </div>
                                            <div class="col-sm-3">
                                                {{ $users->name }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                Posisi
                                            </div>
                                            <div class="col-sm-3">
                                                {{ ucwords($users->role) }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                Email
                                            </div>
                                            <div class="col-sm-3">
                                                {{ $users->email }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="row">
                                            <!-- <div class="col-sm-3">tes</div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <i class="fa fa-align-justify"></i> Update Password 
                                </div>
                                <div class="card-block">
                                    <form class="form-horizontal" method="POST" action="{{ route('users.update', $users->id) }}">
                                        {{method_field("PATCH")}}
                                        {{ csrf_field() }}
                                        
                                        <div class="form-group">
                                            <label class="form-control-label" for="old_password">Password Lama</label>
                                            <div class="controls">
                                                <div class="input-group">
                                                    <input id="old_password" class="form-control" type="password" name="old_password">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label" for="password">Password Baru</label>
                                            <div class="controls">
                                                <div class="input-group">
                                                    <input id="password" class="form-control" type="password" name="password">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                            
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--/.col-->
                    </div>
                </div>
            </div>
        </main>
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
        });
    } );
</script>