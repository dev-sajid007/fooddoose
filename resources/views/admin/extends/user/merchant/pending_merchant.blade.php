@extends('admin.admin_master')
@section('content')
<div class="row mb-1 ml-1">
    <div class="col-md-9 col-sm-12">
        <h5 class="fw-bold text-dark  font-weight-bold">Pending Merchant Page Section</h5>
    </div>
    <div class="col-md-3 col-sm-12 text-center">
        <a href="{{url('admin/merchant/create')}}" class="btn btn-danger float-end  mx-auto" >

        Add Merchant 
        </a>
    </div>
</div>
<div class="row">
{{--     @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}
@if(session('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>{{session('message')}}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                @endif
    <div class="col-md-12 mb-3">

            
        <div class="card">
            <!-- <div class="card-header">
                <h5 class="fw-bold"> merchant Page Section</h5>
            </div> -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-white m-0" id="merchant_pages_table">
                        <thead class="table-header-style">
                            <tr>
                                <th>ID</th>
                                <th>Merchant Name</th>
                                <th>Mobile</th>
                                <th>Business Name</th>
                                <th>Bkash Number</th>
                                <th>Rocket Number</th>
                                <th>Status</th>
                                <th>Created at</th>
                                <th>Action</th>
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
<div class="row ">
    
</div>
{{-- @include('admin.extends.accounts.merchant.add_merchant') --}}
@include('admin.extends.user.merchant.update_model')
@endsection
@section('js')
<script>
$(document).ready(function() {
$('.summernote').summernote({
placeholder: 'Info 1',
tabsize: 2,
height: 250,
toolbar: [
[ 'style', [ 'style' ] ],
[ 'font', [ 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear'] ],
[ 'fontname', [ 'fontname' ] ],
[ 'fontsize', [ 'fontsize' ] ],
[ 'color', [ 'color' ] ],
[ 'para', [ 'ol', 'ul', 'paragraph', 'height' ] ],
[ 'table', [ 'table' ] ],
[ 'insert', [ 'link'] ],
[ 'view', [ 'undo', 'redo', 'fullscreen', 'codeview', 'help' ] ]
]
});
});
$(document).ready(function () {
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
});
$(function() {
$('#merchant_pages_table').DataTable({
processing: true,
serverSide: true,
responsive: true,
ajax: '{!! route('get_all_pending_merchant.datatable') !!}',
columns: [
{ data: 'merchant_id', name: 'merchant_id' },
{ data: 'name', name: 'users.name' },
{ data: 'phone', name: 'users.phone' },
{ data: 'business_name', name: 'business_name' },
{ data: 'bkash_number', name: 'bkash_number' },
{ data: 'rocket_number', name: 'rocket_number' },
{ data: 'status', name: 'users.status' },
{ data: 'created_at', name: 'created_at' },
{ data: 'action', name: 'action' },
],
order: [
[0, 'desc']
],
dom: 'Blfrtip',
buttons: [
'copy', 'csv', 'excel', 'pdf', 'print'
]
});
});
// start delete------------------------
$(document).on('click', '.delete', function () {
dataId = $(this).attr('id');
// alert(dataId);
Swal.fire({
title: 'Are you sure?',
text: "You won't be able to revert this!",
icon: 'warning',
showCancelButton: true,
confirmButtonColor: '#3085d6',
cancelButtonColor: '#d33',
confirmButtonText: 'Yes, delete it!'
}).then((result) => {
if (result.isConfirmed) {
$.ajax({
url: "delete_merchant_api/" + dataId, //ajax execution to this url
type: 'delete',
data:{
_token:'{{ csrf_token() }}'
},
beforeSend: function () {
},
success: function (data) {
setTimeout(function () {
var oTable = $('#merchant_pages_table').dataTable();
oTable.fnDraw(false); //reset datatable
});
}
});
Swal.fire(
'Deleted!',
'Your merchant page file has been deleted.',
'success'
)
}
})
});
// delete end
// start contact us edit button update model
$('body').on('click', '.edit-post', function () {
var data_id = $(this).data('id');
// alert(data_id);
$.get('/admin/single-merchant-table-information/' + data_id, function (data) {
$('#Update_category_model_heading').html("Update merchant Page"); //this is title
$('#update-user-btn').val("edit-post");
$('#edit-modal').modal('show');
$('#merchant_id').val(data.merchant_id);
$('#business_name').val(data.business_name);
$('#rocket_number').val(data.rocket_number);
$('#bkash_number').val(data.bkash_number);
$('#bank_name').val(data.bank_name);
$('#account_number').val(data.account_number);
$('#account_name').val(data.account_name);
$('#payment_method').val(data.payment_method);
$('#nagad_number').val(data.nagad_number);
})
});
// end subcategory edit button update model
// start update contact us  form
if ($("#update_merchant").length > 0) {
$("#update_merchant").validate({
submitHandler: function (form) {
var actionType = $('#merchant_update_submit_button').val();
$('#merchant_update_submit_button').html('Sending Request...');
$.ajax({
data: $('#update_merchant')
.serialize(), //functions that are used so that values on form-controls such as input, textarea, select etc. can be used in the URL query string when making ajax requests
url: "{{ route('merchant.update') }}", //save data url
type: "POST", //because save we use the POST method
dataType: 'json', //the data type we send is JSON
success: function (data) { //if it succeed
$('#update_merchant').trigger("reset"); //form reset
$('#edit-modal').modal('hide'); //modal hide
$('#merchant_update_submit_button').html('Update merchant Page');  //save button
var oTable = $('#merchant_pages_table').dataTable(); //initialization datatable
oTable.fnDraw(false); //reset datatable
iziToast.success({ //show iziToast with notification data successfully saved in the lower right position
title: 'merchant Page Successfully Updated',
message: '{{ Session('
success ')}}',
position: 'bottomRight'
});
function openToast(text, icon, bgColor) {
$.toast({
text: `<h6 class="my-2">${text}</h6>`,
icon: icon,
showHideTransition: "slide",
bgColor: bgColor,
textColor: "#eee",
hideAfter: 3000,
textAlign: "left",
position: "top-right",
});
}
// openToast("This is a success toast message", "success", "#269940");
},
error: function (data) { //if an error shows an error on the console
console.log('Error:', data);
$('#merchant_update_submit_button').html('Update merchant Page');
}
});
}
})
}
// store_contact us
if ($("#store_merchant").length > 0) {
$("#store_merchant").validate({
submitHandler: function (form) {
var actionType = $('#store_merchant_submit_button').val();
$('#store_merchant_submit_button').html('Sending Request...');
$.ajax({
data: $('#store_merchant')
.serialize(), //functions that are used so that values on form-controls such as input, textarea, select etc. can be used in the URL query string when making ajax requests
url: "{{ route('merchant.store') }}", //save data url
type: "POST", //because save we use the POST method
dataType: 'json', //the data type we send is JSON
success: function (data) { //if it succeed
$('#store_merchant').trigger("reset"); //form reset
$('#add-modal').modal('hide'); //modal hide
$('#store_merchant_submit_button').html('Store merchant');  //save button
var oTable = $('#merchant_pages_table').dataTable(); //initialization datatable
oTable.fnDraw(false); //reset datatable
iziToast.success({ //show iziToast with notification data successfully saved in the lower right position
title: 'merchant  Successfully Added',
message: '{{ Session('
success ')}}',
position: 'bottomRight'
});
},
error: function (data) { //if an error shows an error on the console
// console.log('Error:', data);
console.log(data.response.data.errors)
$('#wayError').text(data.dataJSON.errors.way);
// alert(data.title);
// $('#titleError').text(data.errors.title);
// alert('Error:',data);
$('#store_merchant_submit_button').html('Store merchant ');
}
});
}
})
}
</script>
@endsection