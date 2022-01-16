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
        <button type="button" class="btn btn-danger float-end  mx-auto" data-bs-toggle="modal" data-bs-target="#add-modal">
      Add Staff
        </button>
    </div>
</div>
	
	<table class="table table-white m-0" id="staff_table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Status</th>
				<th>Email</th>
				<th>Created at</th>
				<th>Updated at</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
</div>
@include('admin.extends.user.staff_managment.delete_confirmation')
@include('admin.extends.user.staff_managment.update_model')
@include('admin.extends.user.staff_managment.add_staff')
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
$('#staff_table').DataTable({
processing: true,
serverSide: true,
responsive: true,
ajax: '{!! route('all_staff.list') !!}',
columns: [
{ data: 'id', name: 'users.id' },
{ data: 'account_name', name: 'account_name' },
{ data: 'role_name', name: 'role_name' },
{ data: 'email', name: 'users.email' },
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