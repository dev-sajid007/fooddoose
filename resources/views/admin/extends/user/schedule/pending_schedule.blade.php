@extends('admin.admin_master')
@section('content')
<div class="frame-wrap">
	<div class="row">
		<div class="col-md-12">
			@if ($message = Session::get('warning'))
			<div class="alert alert-success alert-block" mb-5>
				<button type="button" class="close" data-bs-dismiss="alert">×</button>
				<strong class="text-danger">{{ $message }}</strong>
			</div>
			@endif
			
		</div>
		
	</div>


	<div class="row mb-1 ml-1">
    <div class="col-md-9 col-sm-12">
        <h5 class="fw-bold text-dark  font-weight-bold"> Staff Page Section</h5>
    </div>
       <div class="col-md-3 col-sm-12 text-center">
        <a href="{{url('admin/merchant/create')}}">
        <button type="button" class="btn btn-danger float-end  mx-auto"  >
      Add Merchant
        </button></a>
    </div>
</div>
	
	<table class="table table-white m-0" id="merchant_table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Business Name</th>
				<th>Bkash Number</th>
				<th>Rocket Number</th>
				<th>Nagad Number</th>
				<th>bank_name</th>
				<th>Account Name</th>
				<th>Account Number</th>
				<th>Payment Method</th>
				<th>Created at</th>
				<th>Updated at</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
</div>
@endsection
@section('js')
<script>
$(document).ready(function () {
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
});
$(function() {
$('#merchant_table').DataTable({
processing: true,
serverSide: true,
responsive: true,
ajax: '{!! route('get_all_pending_merchant.datatable') !!}',
columns: [
{ data: 'id', name: 'users.id' },
{ data: 'name', name: 'users.name' },
{ data: 'email', name: 'users.email' },
{ data: 'phone', name: 'users.phone' },
{ data: 'business_name', name: 'merchant.business_name' },
{ data: 'bkash_number', name: 'merchant.bkash_number' },
{ data: 'rocket_number', name: 'merchant.rocket_number' },
{ data: 'nagad_number', name: 'merchant.nagad_number' },
{ data: 'bank_name', name: 'merchant.bank_name' },
{ data: 'account_name', name: 'merchant.account_name' },
{ data: 'account_number', name: 'merchant.account_number' },
{ data: 'account_number', name: 'merchant.payment_method' },
{ data: 'created_at', name: 'users.created_at' },
{ data: 'updated_at', name: 'users.updated_at' },
{ data: 'action', name: 'action' },
],
order: [
[0, 'desc']
],
});
});
// start delete manufacturer------------------------
$(document).on('click', '.delete', function () {
dataId = $(this).attr('id');
// alert(dataId);
$('#DeleteConfirmation-modal').modal('show');
});
$('#record-delete').click(function () {
$.ajax({
url: "delete_staff_api/" + dataId, //ajax execution to this url
type: 'delete',
data:{
_token:'{{ csrf_token() }}'
},
beforeSend: function () {
$('#record-delete').text('Clear Data'); //set text for the delete button
},
success: function (data) { //if successful
setTimeout(function () {
$('#DeleteConfirmation-modal').modal('hide'); //hide capital confirmation
var oTable = $('#staff_table').dataTable();
oTable.fnDraw(false); //reset datatable
});
// alert('user successfully deleted');
// swal("User Successfully Deleted");
iziToast.success({ // izitoast warning
title: 'Staff  successfully deleted',
message: '{{ Session('
delete ')}}',
position: 'bottomRight'
});
}
})
});
	
	// end delete manufacturer --------------------------------
		// start subcategory edit button update model
$('body').on('click', '.edit-post', function () {
var data_id = $(this).data('id');
// alert(data_id);
$.get('single-staff-information/' + data_id, function (data) {
$('#Update_category_model_heading').html("Update Sub Category"); //this is title
$('#update-user-btn').val("edit-post");
$('#SubCategory_submit_button').html("Update Sub Category");
$('#edit-modal').modal('show');
//set the value of each id based on the data obtained from the ajax get request above
// alert(val(data.id));
$('#id').val(data.id);
$('#role_id').val(data.role_id);
$('#status').val(data.status);
$('#name').val(data.name);
$('#email').val(data.email);
$('#address').html(data.address);
})
});
	// end subcategory edit button update model
</script>
@endsection