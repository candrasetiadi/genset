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
                            <form class="form-horizontal" method="POST" action="{{ route('guide.update', $guide->id) }}">
                                {{method_field("PATCH")}}
                            	{{ csrf_field() }}
	                            
                                <div class="form-group row">
                                	<div class="col-md-6">
                                		<label class="form-control-label" for="name">Title</label>
	                                    <div class="controls">
	                                        <div class="input-group">
	                                            <input id="name" class="form-control" type="text" name="name" value="{{ $guide->name }}">
	                                        </div>
	                                    </div>
                                	</div>
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="email">Email</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input id="email" class="form-control" type="email" name="email" value="{{ $guide->email }}">
                                            </div>
                                        </div>
                                    </div>                            
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="address">Address</label>
                                    <div class="controls">
                                        <div class="input-prepend input-group">
                                            <textarea id="address" name="address" rows="3" class="form-control" placeholder="">{{ $guide->address }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                	<div class="col-md-6">
                                		<label class="form-control-label" for="id_province">Province</label>
	                                    <div class="controls">
	                                        <div class="input-group">
	                                            <select id="id_province" name="id_province" class="form-control">
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
	                                            <select id="id_regencies" name="id_regencies" class="form-control">
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
                                        <label class="form-control-label" for="region_province">Region Province</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <select id="region_province" name="region_province" class="form-control">
                                                    <option value="0">&nbsp;</option>
                                                    @foreach($provinces as $province)
                                                        <option value="{{ $province->id }}">{{ $province->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="region_regencies">Region Regencies</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <select id="region_regencies" name="region_regencies" class="form-control">
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
	                                            <input id="phone_1" class="form-control" size="16" type="text" name="phone_1" value="{{ $guide->phone_1 }}">
	                                        </div>
	                                    </div>
                                	</div>
                                	<div class="col-md-6">
                                		<label class="form-control-label" for="phone_2">Phone 2</label>
	                                    <div class="controls">
	                                        <div class="input-group">
	                                            <input id="phone_2" class="form-control" size="16" type="text" name="phone_2" value="{{ $guide->phone_2 }}">
	                                        </div>
	                                    </div>
                                	</div>                                    
                                </div>
                                
                                <div class="form-group row">
                                	<div class="col-md-6">
                                		<label class="form-control-label" for="gender">Gender</label>
	                                    <div class="controls">
	                                        <div class="input-group">
	                                            <select id="gender" name="gender" class="form-control">
                                                    <option value="0">&nbsp;</option>
                                                    <option value="man">Man</option>
                                                    <option value="women">Women</option>
                                                </select>
	                                        </div>
	                                    </div>
                                	</div>                                
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="talent">Talent</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <select id="talent" name="talent[]" class="form-control multiple-select" multiple="multiple">
                                                    @foreach($talents as $talent)
                                                        <option value="{{ $talent->id }}">{{ $talent->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="language">Language</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <select id="language" name="language[]" class="form-control multiple-select" multiple="multiple">
                                                    @foreach($languages as $language)
                                                        <option value="{{ $language->id }}">{{ $language->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>   
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="type_of_id">Type Of ID</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <select id="type_of_id" name="type_of_id" class="form-control">
                                                    <option value="0">&nbsp;</option>
                                                    <option value="ktp">KTP</option>
                                                    <option value="sim">SIM</option>
                                                    <option value="paspor">Paspor</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="number_of_id">Number Of ID</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input id="number_of_id" class="form-control" type="text" name="number_of_id" value="{{ $guide->number_of_id }}">
                                            </div>
                                        </div>
                                    </div>                            
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <div class="controls">
                                            <div class="input-group">
                                                <div class="checkbox">
                                                    <label for="is_gathering">
                                                        <input id="is_gathering" type="checkbox" name="is_gathering" value="is_gathering"> Is Gathering
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>   
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="rating">Rating</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input id="rating" class="form-control" type="number" name="rating" max="5" value="{{ $guide->rating }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="age">Age</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input id="age" class="form-control" type="number" name="age" value="{{ $guide->age }}">
                                            </div>
                                        </div>
                                    </div>     
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="additional_service">Additional Services</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input id="additional_service" class="form-control" type="text" name="additional_service" value="{{ $guide->additional_service }}">
                                            </div>
                                        </div>
                                    </div>                            
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="price">Price</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input id="price" class="form-control" type="number" name="price" value="{{ $guide->price }}">
                                            </div>
                                        </div>
                                    </div>     
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="capacity">Capacity</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input id="capacity" class="form-control" type="text" name="capacity" value="{{ $guide->capacity }}">
                                            </div>
                                        </div>
                                    </div>                            
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                    <a href="{{ route('guide.index') }}"><button type="button" class="btn btn-default">Cancel</button></a>
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
