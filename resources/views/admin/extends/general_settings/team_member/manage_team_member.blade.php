@extends('admin.admin_master')
@section('content')
<div class="row">
    <div class="col-md-12 mb-3">

    

        <button type="button" class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#add-modal">

        Add Team Member
        </button>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="card">
                <!-- <div class="card-header">
                    <h5 class="fw-bold"> Footer Page Section</h5>
                </div> -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-white m-0" id="team_member_table">
                            <thead class="table-header-style">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Phont</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    <th width="10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</div>
@include('admin.extends.general_settings.team_member.delete_confirmation')
@include('admin.extends.general_settings.team_member.add_team_member')
@include('admin.extends.general_settings.team_member.update_model')
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
$('#team_member_table').DataTable({
processing: true,
serverSide: true,
responsive: true,
ajax: '{!! route('all_team_members.list') !!}',
columns: [
{ data: 'team_member_id', name: 'team_member_id' },
{ data: 'name', name: 'name' },
{ data: 'position', name: 'position' },
{ data: 'phone', name: 'phone' },
{ data: 'email', name: 'email' },
{data: 'team_member_image', name: 'team_member_image',
render: function( data, type, full, meta ) {
return "<img src=\"/frontend_upload_asset/general_settings/team_member/" + data + "\" height=\"80\" alt='No Image'/>";
}
},
{ data: 'created_at', name: 'created_at' },
{ data: 'updated_at', name: 'updated_at' },
{ data: 'action', name: 'action' },
],
order: [
[0, 'desc']
],
});
});
// start delete team_member_table------------------------
$(document).on('click', '.delete', function () {
dataId = $(this).attr('id');
// alert(dataId);
$('#DeleteConfirmation-modal').modal('show');
});
$('#record-delete').click(function () {
$.ajax({
url: "delete_team_member_api/" + dataId, //ajax execution to this url
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
var oTable = $('#team_member_table').dataTable();
oTable.fnDraw(false); //reset datatable
});
// alert('user successfully deleted');
// swal("User Successfully Deleted");
iziToast.success({ // izitoast warning
title: 'Team member successfully deleted',
message: '{{ Session('
delete ')}}',
position: 'bottomRight'
});
}
})
});
// end delete Contact us --------------------------------
// store team member
if ($("#store_team_member").length > 0) {
$("#store_team_member").validate({
submitHandler: function (form) {
var actionType = $('#store_team_member_submit_button').val();
$('#store_team_member_submit_button').html('Sending..');
var form = $('#store_team_member')[0];
var formData = new FormData(form);
event.preventDefault();
$.ajax({
url: "{{ route('team_member.store') }}", // the endpoint
type: "POST", // http method
processData: false,
contentType: false,
data: formData,
success: function (data) { //if it succeed
$('#store_team_member').trigger("reset"); //form reset
$('#add-modal').modal('hide'); //modal hide
$('#store_team_member_submit_button').html('Add New Team Member'); //save button
var oTable = $('#team_member_table').dataTable(); //initialization datatable
oTable.fnDraw(false); //reset datatable
iziToast.success({ //show iziToast with notification data successfully saved in the lower right position
title: 'Team Member Successfully Added',
message: '{{ Session('
success ')}}',
position: 'bottomRight'
});
},
error: function (data) { //if an error shows an error on the console
console.log('Error:', data);
$('#store_team_member_submit_button').html('Add New Team Member');
}
});
}
})
}
// start contact us edit button update model
$('body').on('click', '.edit-post', function () {
var data_id = $(this).data('id');
// alert(data_id);
$.get('single-team-member-table-information/' + data_id, function (data) {
$('#Update_category_model_heading').html("Update Footer Page"); //this is title
$('#update-user-btn').val("edit-post");
$('#edit-modal').modal('show');
$('#team_member_id').val(data.team_member_id);
$('#name').val(data.name);
$('#details').html(data.details);
$('#position').val(data.position);
$('#phone').val(data.phone);
$('#email').val(data.email);
$('#facebook').val(data.facebook);
$('#linkdin').val(data.linkdin);
$('#twitter').val(data.twitter);
})
});
// end subcategory edit button update model
// start update contact us  form
// store team member
if ($("#update_or_create_from").length > 0) {
$("#update_or_create_from").validate({
submitHandler: function (form) {
var actionType = $('#team_member_submit_button').val();
$('#team_member_submit_button').html('Sending..');
var form = $('#update_or_create_from')[0];
var formData = new FormData(form);
event.preventDefault();
$.ajax({
url: "{{ route('team_member.update') }}", // the endpoint
type: "POST", // http method
processData: false,
contentType: false,
data: formData,
success: function (data) { //if it succeed
$('#update_or_create_from').trigger("reset"); //form reset
$('#edit-modal').modal('hide'); //modal hide
$('#team_member_submit_button').html('Add New Team Member'); //save button
var oTable = $('#team_member_table').dataTable(); //initialization datatable
oTable.fnDraw(false); //reset datatable
iziToast.success({ //show iziToast with notification data successfully saved in the lower right position
title: 'Team Member Successfully Updated',
message: '{{ Session('
success ')}}',
position: 'bottomRight'
});
},
error: function (data) { //if an error shows an error on the console
console.log('Error:', data);
$('#team_member_submit_button').html('Update New Team Member');
}
});
}
})
}
</script>

@endsection

