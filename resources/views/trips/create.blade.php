@extends('layouts.default-login')

@section('content')
<main class="main">
	<!-- Breadcrumb -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="#">Admin</a>
        </li>
        <li class="breadcrumb-item active">Trips</li>
    </ol>

    <div class="container-fluid">
    	<div class="animated fadeIn">
    		<div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-edit"></i>Add New Trip
                        </div>
                        <div class="card-block">
                            <form class="form-horizontal" method="POST" action="{{ url('admin/trips') }}">
                            	{{ csrf_field() }}
	                            <div class="form-group row">
                            		<div class="col-md-6">
	                                    <label class="form-control-label" for="type">Type</label>
	                                    <div class="controls">
	                                        <div class="input-prepend input-group">
	                                            <select id="type" name="type" class="form-control" size="1" placeholder="Please Select" id="type">
				                                    <option value="0">&nbsp;</option>
				                                    <option value="hotel">Hotel</option>
				                                    <option value="resto">Restaurant</option>
				                                    <option value="transportation">Transportation</option>
				                                    <option value="tour">tour</option>
				                                </select>
	                                        </div>
	                                        <p class="help-block"></p>
	                                    </div>
	                                </div>
	                                
	                            </div>
                                <div class="form-group row">
                                	<div class="col-md-6">
                                		<label class="form-control-label" for="name">Name</label>
	                                    <div class="controls">
	                                        <div class="input-group">
	                                            <input id="name" class="form-control" type="text" name="name">
	                                           <!--  <span class="input-group-addon">.00</span> -->
	                                        </div>
	                                        <!-- <span class="help-block">Here's more help text</span> -->
	                                    </div>
                                	</div>
                                	<div class="col-md-6">
	                                	<label class="form-control-label" for="email">Email</label>
	                                    <div class="controls">
	                                        <div class="input-group">
	                                            <input id="email" class="form-control" type="email" name="email">
	                                        </div>
	                                    </div>
	                                </div>	                                    
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="address">Address</label>
                                    <div class="controls">
                                        <div class="input-prepend input-group">
                                            <!-- <span class="input-group-addon">$</span> -->
                                            <textarea id="address" name="address" rows="3" class="form-control" placeholder=""></textarea>
                                            <!-- <span class="input-group-addon">.00</span> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                	<div class="col-md-6">
                                		<label class="form-control-label" for="id_province">Provinsi</label>
	                                    <div class="controls">
	                                        <div class="input-group">
	                                            <select id="id_province" name="id_province" class="form-control" size="1" placeholder="Please Select">
				                                    <option value="0">&nbsp;</option>
				                                    @foreach($provinces as $province)
				                                        <option value="{{ $province->id }}">{{ $province->name }}</option>
                                                    @endforeach
				                                </select>
	                                        </div>
	                                    </div>
                                	</div>
	                                <div class="col-md-6">
	                                	<label class="form-control-label" for="id_regencies">Regencies</label>
	                                    <div class="controls">
	                                        <div class="input-group">
	                                            <select id="id_regencies" name="id_regencies" class="form-control" size="1" placeholder="Please Select">
				                                    <option value="0">&nbsp;</option>
				                                    @foreach($regencies as $regency)
                                                        <option value="{{ $regency->id }}">{{ $regency->name }}</option>
                                                    @endforeach
				                                </select>
	                                        </div>
	                                    </div>
	                                </div>
                                </div>
                                <div class="form-group row">
                                	<div class="col-md-6">
                                		<label class="form-control-label" for="phone_1">Phone 1</label>
	                                    <div class="controls">
	                                        <div class="input-group">
	                                            <input id="phone_1" class="form-control" size="16" type="text" name="phone_1">
	                                        </div>
	                                    </div>
                                	</div>
                                	<div class="col-md-6">
                                		<label class="form-control-label" for="phone_2">Phone 2</label>
	                                    <div class="controls">
	                                        <div class="input-group">
	                                            <input id="phone_2" class="form-control" size="16" type="text" name="phone_2">
	                                        </div>
	                                    </div>
                                	</div>                                    
                                </div>
                                
                                <div class="form-group row">
                                	<div class="col-md-6">
                                		<label class="form-control-label" for="location_coordinate">Location Coordinate</label>
	                                    <div class="controls">
	                                        <div class="input-group">
	                                            <input id="location_coordinate" class="form-control" type="text" name="location_coordinate">
	                                        </div>
	                                    </div>
                                	</div>
                                	<div class="col-md-6 transport_field">
                                		<label class="form-control-label" for="transportation_unit_total">Transportation Unit</label>
	                                    <div class="controls">
	                                        <div class="input-group">
	                                            <input id="transportation_unit_total" class="form-control" size="1" type="number" min="1" name="transportation_unit_total">
	                                        </div>
	                                    </div>
                                	</div>                                    
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="remark">Remark</label>
                                    <div class="controls">
                                        <div class="input-prepend input-group">
                                            <!-- <span class="input-group-addon">$</span> -->
                                            <textarea id="remark" name="remark" rows="3" class="form-control" placeholder=""></textarea>
                                            <!-- <span class="input-group-addon">.00</span> -->
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <h5 class="hotel_field">Hotel</h5>
                                <div class="form-group row">
                                	<div class="col-md-6 hotel_field">
                                		<label class="form-control-label" for="hotel_room_total">Hotel Room Total</label>
	                                    <div class="controls">
	                                        <div class="input-group">
	                                            <input id="hotel_room_total" class="form-control" type="number" name="hotel_room_total">
	                                        </div>
	                                    </div>
                                	</div>
                                	<div class="col-md-6 hotel_field">
                                		<label class="form-control-label" for="hotel_rating">Hotel Rating</label>
	                                    <div class="controls">
	                                        <div class="input-group">
	                                            <input id="hotel_rating" class="form-control" size="1" type="number" min="1" max="5" name="hotel_rating">
	                                        </div>
	                                    </div>
                                	</div>                                    
                                </div>
                                <div class="form-group row">
                                	<div class="col-md-6 hotel_field">
                                		<label class="form-control-label" for="hotel_name">Hotel Type Name</label>
	                                    <div class="controls">
	                                        <div class="input-group">
	                                            <input id="hotel_name" class="form-control" type="text" name="hotel_name">
	                                        </div>
	                                    </div>
                                	</div>
                                	<div class="col-md-6 hotel_field">
                                		<label class="form-control-label" for="transportation_unit_total">Price Per Room</label>
	                                    <div class="controls">
	                                        <div class="input-group">
	                                            <input id="transportation_unit_total" class="form-control" type="text" name="transportation_unit_total">
	                                        </div>
	                                    </div>
                                	</div>                                    
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                    <button type="button" class="btn btn-default">Cancel</button>
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
        
        $(document).on('change', '#type', function(e){
        	e.preventDefault();
        	var type = $(this).val();

        	if( type == 'hotel' ) {
        		$(".hotel_field").show();
        		$(".transport_field").hide();
        	} else if( type == 'resto' ) {
        		$(".hotel_field").hide();
        		$(".transport_field").hide();
        	} else if( type == 'transportation' ) {
        		$(".hotel_field").hide();
        		$(".transport_field").show();
        	} else if( type == 'tour' ) {
        		$(".hotel_field").hide();
        		$(".transport_field").hide();
        	} else {

        	}
        });

        $(document).on('change', '#id_province', function(e){
        	var id_province = $(this).val();

        	alert(id_province);
        });
    } );
</script>
