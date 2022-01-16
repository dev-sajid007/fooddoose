@extends('admin.admin_master')
@section('css')
<style type="text/css">
	input.error {
    color: red;
}
</style>
@endsection
@section('content')
<div class="col-12">
	<div class="card">
		<div class="card-body">
			<form method="post" id="change_customer_password" action="{{url('admin/update-customer-password')}}" enctype="multipart/form-data">
				@csrf
				<input type="hidden" name="id" value="{{$select_customer_table->id}}" id="id">
				
				<div class="row mt-5 mb-5">
					<div class="form-group">
						<label class="form-label"  for="password">Customer Password <span class="text-danger"> : {{$select_customer_table->name}}</span></label>
						<input value="" type="password" name="password" id="password" class="form-control " placeholder="Customer Password" autocomplete="off">
						<span class="text-danger">{{$errors->first('password')}}</span>
					</div>
					<div class="form-group mt-3">
						<label class="form-label"  for="simpleinput"> Email Notification</label>
						<select class="form-control" name="mail">
							<option selected value="1">Not Send Mail</option>
							<option value="2">Send Mail</option>
						</select>
					</div>
				</div>
				<button type="Submit" class="btn btn-primary">Update Customer Password</button>
				<button type="reset" class="btn btn-danger">Reset</button>
			</form>
		</div>
	</div>
</div>
@endsection
@section('js')
<script type="text/javascript">
	
$("#change_customer_password").validate({
rules: {
password: {
required: true,
minlength: 8
},
messages: {
password: {
required: "Please provide a password",
minlength: "Your password must be at least 8 characters long"
},
},

},
errorPlacement: function(label, element) {
label.addClass('mt-2 text-danger');
label.insertAfter(element);
},
highlight: function(element, errorClass) {
$(element).parent().addClass('has-danger')
$(element).addClass('form-control-danger')
}
});
</script>
@endsection