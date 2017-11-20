@extends('layouts.default-login')

@section('content')
    <main class="main">

        @include('layouts.breadcrumb')

        <div class="container-fluid">
        	<div class="animated fadeIn">
        		<div class="row">
        			<div class="col-lg-12">
        				<a href="{{ route( 'rent.index' ) }}"><button class="btn btn-warning">Back</button></a>
        				<div>&nbsp;</div>
        			</div>
        			<div class="col-lg-12">
        				<div class="card">
        					<div class="card-header">
                                <i class="fa fa-align-justify"></i> {{ $title }}
                            </div>
                            <div class="card-block">
                            	<table width="100%">
				                    <tr>
				                        <td width="40%"><label>Nomor Kapal</label></td>
				                        <td width="5%"><label>:</label></td>
				                        <td width="55%"><label>{{ $data->ship_no }}</label></td>
				                    </tr>
				                    <tr>
				                        <td width="40%"><label>Nomor Container</label></td>
				                        <td width="5%"><label>:</label></td>
				                        <td width="55%"><label>{{ $data->container_no }}</label></td>
				                    </tr>
				                    <tr>
				                        <td width="40%"><label>Nama Container</label></td>
				                        <td width="5%"><label>:</label></td>
				                        <td width="55%"><label>{{ $data->container_name }}</label></td>
				                    </tr>
				                    <tr>
				                        <td width="40%"><label>Nama Lapangan</label></td>
				                        <td width="5%"><label>:</label></td>
				                        <td width="55%"><label>{{ $data->field_name }}</label></td>
				                    </tr>
				                    <tr>
				                        <td width="40%"><label>Set Point</label></td>
				                        <td width="5%"><label>:</label></td>
				                        <td width="55%"><label>{{ $data->set_point }}</label></td>
				                    </tr>
				                    <tr>
				                        <td width="40%"><label>Tanggal Masuk</label></td>
				                        <td width="5%"><label>:</label></td>
				                        <td width="55%"><label>{{ $data->date_in }}</label></td>
				                    </tr>
				                    <tr>
				                        <td width="40%"><label>Jam Masuk</label></td>
				                        <td width="5%"><label>:</label></td>
				                        <td width="55%"><label>{{ $data->time_in }}</label></td>
				                    </tr>
				                </table>
                            </div>
                        </div>
                        <div class="card">
                        	<div class="card-block">
                        		@if ( $data->status == 1 )
		                        	<form class="form-horizontal" method="POST" action="{{ route('rent.update', $data->id) }}">
		                        		{{method_field("PATCH")}}
		                            	{{ csrf_field() }}
			                            
		                                <div class="form-group row">
		                                	<div class="col-md-6">
			                            		<label class="form-control-label" for="date_out">Tanggal Keluar</label>
			                                    <div class="controls">
			                                        <div class="input-group">
			                                            <input id="date_out" class="form-control datetimepickers" type="text" name="date_out" value="{{ $data->date_out }}">
			                                        </div>
			                                    </div>
			                                </div>
			                                <div class="col-md-6">
			                            		<label class="form-control-label" for="time_out">Jam Keluar</label>
			                                    <div class="controls">
			                                        <div class="input-group">
			                                            <input id="time_out" class="form-control timepickers" type="text" name="time_out" value="{{ $data->time_out }}">
			                                        </div>
			                                    </div>
			                                </div>
		                                </div>
		                                <div class="form-group row">
		                                	<div class="col-md-6">
			                            		<label class="form-control-label" for="temperature_out">Suhu</label>
			                                    <div class="controls">
			                                        <div class="input-group">
			                                            <input id="temperature_out" class="form-control" type="text" name="temperature_out" value="{{ $data->temperature_out }}">
			                                        </div>
			                                    </div>
			                                </div>
		                                </div>
		                                <div class="form-actions">
		                                    <button type="submit" class="btn btn-primary">Save changes</button>
		                                    
		                                </div>
		                            </form>
		                        @else
		                        	<table width="100%">
					                    <tr>
					                        <td width="40%"><label>Tanggal Keluar</label></td>
					                        <td width="5%"><label>:</label></td>
					                        <td width="55%"><label>{{ $data->date_out }}</label></td>
					                    </tr>
					                    <tr>
					                        <td width="40%"><label>Jam Keluar</label></td>
					                        <td width="5%"><label>:</label></td>
					                        <td width="55%"><label>{{ $data->time_out }}</label></td>
					                    </tr>
					                    <tr>
					                        <td width="40%"><label>Suhu</label></td>
					                        <td width="5%"><label>:</label></td>
					                        <td width="55%"><label>{{ $data->temperature_out }}</label></td>
					                    </tr>
					                </table>
		                        @endif
	                        </div>
                        </div>
                        <div class="card">
                            <div class="card-block">
                            	<h4>Temperature Record</h4>
                            	@if ( $data->status == 1 )
	                            	<button type="button" class="btn btn-primary" data-action="add" data-toggle="modal" data-target="#primaryModal" data="">
	                            	    <i class="fa fa-plus"></i> Add
	                            	</button>
	                            @endif
                            	<table class="stripe hover mdl-data-table" id="settable" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="35%">Tanggal</th>
                                            <th width="35%">Jam Shift</th>
                                            <th width="25%">Suhu</th>
                                            <th width="5%">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr></tr>
                                    </tfoot>
                                    <tbody>
                                    	@foreach ($details as $detail)
                                            <tr>
                                                <td>{{ $detail->date }}</td>
                                                <td>{{ $timeShift[$detail->time_shift] }}</td>
                                                <td>{{ $detail->temperature }} &deg;C</td>
                                                <td>
                                                	@if ( $data->status == 1 )
                                                    	<a href="" data-action="edit" data-id="{{ $detail->id }}" data-toggle="modal" data-target="#primaryModal" title="Edit" class="edit"><span class="badge badge-warning"><i class="fa fa-edit"></i></span></a>
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
                <form class="form" method="POST" action="{{ url('admin/rent/detail') }}">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Data </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">

	                    {{ csrf_field() }}
	                    
	                    <div class="form-group">
	                        <label class="form-control-label" for="date">Tanggal</label>
	                        <div class="controls">
	                            <div class="input-group">
	                                <input id="date" class="form-control datetimepickers" type="text" name="date" value="">
	                                <input type="hidden" name="id_rent" id="id_rent" value="{{ $data->id }}">
	                                <input type="hidden" name="id" id="id" value="">
	                                <input type="hidden" name="_method" id="method" value="POST">
	                            </div>
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="form-control-label" for="time_shift">Jam Shift</label>
	                        <div class="controls">
	                            <select id="time_shift" name="time_shift" class="form-control" placeholder="Please Select">
	                                <option value="0">&nbsp;</option>
	                                @foreach($timeShift as $key => $val)
	                                    <option value="{{ $key }}">{{ $val }}</option>
	                                @endforeach
	                            </select>
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="form-control-label" for="temperature">Suhu</label>
	                        <div class="controls">
	                            <div class="input-group">
	                                <input id="temperature" class="form-control"  type="text" name="temperature">
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
        })
    })
</script>