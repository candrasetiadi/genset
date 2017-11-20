@extends('layouts.default-login')

@section('content')
<main class="main">
	
    @include('layouts/breadcrumb')

    <div class="container-fluid">
    	<div class="animated fadeIn">
    		<div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-edit"></i>Add New {{ $title }}
                        </div>
                        <div class="card-block">
                            <form class="form-horizontal" method="POST" action="{{ url('admin/invoice') }}">
                            	{{ csrf_field() }}
	                            
                                <div class="form-group row">
                                	<div class="col-md-6">
                                		<label class="form-control-label" for="id_province">Lapangan</label>
	                                    <div class="controls">
	                                        <div class="input-group">
	                                            <select id="id_province" name="id_province" class="form-control">
				                                    <option value="0">&nbsp;</option>
                                                    @foreach($fields as $key => $val)
                                                        <option value="{{ $val->id }}">{{ $val->name }}</option>
                                                    @endforeach
				                                </select>
	                                        </div>
	                                    </div>
                                	</div>
	                                <div class="col-md-6">
	                                	<label class="form-control-label" for="id_regencies">Customer</label>
	                                    <div class="controls">
	                                        <div class="input-group">
	                                            <select id="id_regencies" name="id_regencies" class="form-control">
				                                    <option value="0">&nbsp;</option>
				                                    @foreach($customers as $key => $val)
                                                        <option value="{{ $val->id }}">{{ $val->name }}</option>
                                                    @endforeach
				                                </select>
	                                        </div>
	                                    </div>
	                                </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="start_date">Periode 1</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input id="start_date" class="form-control datetimepickers"  type="text" name="start_date" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="end_date">Periode 2</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input id="end_date" class="form-control datetimepickers"  type="text" name="end_date" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="remark">Keterangan</label>
                                    <div class="controls">
                                        <div class="input-group">
                                            <textarea id="remark" class="form-control" name="remark" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                    <a href="{{ route('invoice.index') }}"><button type="button" class="btn btn-default">Cancel</button></a>
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

        $(document).on('change', '#id_province', function(e){
            e.preventDefault()

            var _this = $(this).val()

            $.ajax({
                url: "{{URL::to('admin/regencies')}}/"+ _this,
                type: 'GET',
                data: {
                    _method: 'GET',
                    id_regencies : _this,
                    _token:     '{{ csrf_token() }}'
                },
                success: function(response){

                    $("#id_regencies").empty().trigger('change')

                    $.each(response, function(idx, val){

                        $("#id_regencies").append('<option value=' + val.id + '>' + val.name + '</option>')
                        $("#id_regencies").select2()
                    })
                }
            })
        })

        $(document).on('change', '#region_province', function(e){
            e.preventDefault()

            var _this = $(this).val()

            $.ajax({
                url: "{{URL::to('admin/regencies')}}/"+ _this,
                type: 'GET',
                data: {
                    _method: 'GET',
                    id_regencies : _this,
                    _token:     '{{ csrf_token() }}'
                },
                success: function(response){

                    $("#region_regencies").empty().trigger('change')

                    $.each(response, function(idx, val){

                        $("#region_regencies").append('<option value=' + val.id + '>' + val.name + '</option>')
                        $("#region_regencies").select2()
                    })
                }
            })
        })
        
    })
</script>
