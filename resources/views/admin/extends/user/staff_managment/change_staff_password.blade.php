@extends('admin.admin_master')
@section('content')
<div class="frame-wrap">
	<form method="post" action="{{url('admin/update-staff-password')}}" enctype="multipart/form-data">
		@csrf
		<input type="hidden" name="id" value="{{$select_customer_table->id}}" id="id">
		
		<div class="row mt-5 mb-5">
			<div class="col-md-12">

				<div class="form-group">
			<label class="form-label"  for="">Customer Password <span class="text-danger"> : {{$select_customer_table->name}}</span></label>
			<input value="" type="password" name="password" id="password" class="form-control " placeholder="Customer Password" autocomplete="off">
			@if(session('error'))
			<span class="text-danger">{{$errors->first('password')}}</span>
			@endif
		</div>
			</div>
		</div>
		<button type="Submit" class="btn btn-primary">Update Customer Password</button>
		<button type="reset" class="btn btn-danger">Reset</button>
	</form>
</div>
@endsection