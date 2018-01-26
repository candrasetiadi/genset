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
                                                    <td data="{{ $rent->id }}">{{ $rent->rent_no }}</td>
                                                    <td data="{{ $rent->id }}">{{ $rent->ship_name }}</td>
                                                    <td data="{{ $rent->id }}">{{ $rent->container_name }}</td>
                                                    <td data="{{ $rent->id }}">{{ $rent->field_name }}</td>
                                                    <td data="{{ $rent->id }}">{{ $rent->set_point }}</td>
                                                    <td data="{{ $rent->id }}">{{ date('d-m-Y', strtotime($rent->date_in)) }} {{ $rent->time_in }}</td>
                                                    <td data="{{ $rent->id }}">{{ $rent->date_out }}</td>
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
                                                            <input type="checkbox" name="doubleCheck" id="doubleCheck" data="{{ $rent->id }}">
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

        $(document).on('click', '#doubleCheck', function(e){

            var id = $(this).attr('data')

            $.ajax({
                url: "{{URL::to('admin/rent')}}/"+ id + "/doubleCheck",
                type: 'GET',
                data: {
                    _method: 'GET',
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