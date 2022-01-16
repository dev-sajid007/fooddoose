@extends('admin.admin_master')
@section('content')
<div class="row mb-1 ml-1">
    <div class="col-md-9 col-sm-12">
        <h5 class="fw-bold text-dark  font-weight-bold"> Expense Page Section</h5>
    </div>
    <div class="col-md-3 col-sm-12 text-center">
        <button type="button" class="btn btn-danger float-end  mx-auto" data-bs-toggle="modal" data-bs-target="#add-modal">
        Add Expense Page
        </button>
    </div>
</div>
<div class="row">
    <div class="col-md-12 mb-3">
        <div class="card">
            <!-- <div class="card-header">
                <h5 class="fw-bold"> expense Page Section</h5>
            </div> -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-white m-0" id="expense_pages_table">
                        <thead class="table-header-style">
                            <tr>
                                <th>ID</th>
                                <th>Purpose</th>
                                <th>Vendor</th>
                                <th>Amount</th>
                                <th>expense Date</th>
                                <th>Created at</th>
                                <th>Updated at</th>
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
@include('admin.extends.accounts.expense.add_expense')
@include('admin.extends.accounts.expense.update_model')
@endsection
@section('js')
<script>
$(document).ready(function() {
$('.summernote').summernote({
placeholder: 'Info 1',
tabsize: 2,
height: 100,
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
$('#expense_pages_table').DataTable({
processing: true,
serverSide: true,
responsive: true,
ajax: '{!! route('all_expenses.list') !!}',
columns: [
{ data: 'expense_id', name: 'expense_id' },
{ data: 'purpose', name: 'purpose' },
{ data: 'vendor', name: 'vendor' },
{ data: 'amount', name: 'amount' },
{ data: 'expense_date', name: 'expense_date' },
{ data: 'created_at', name: 'created_at' },
{ data: 'updated_at', name: 'updated_at' },
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
url: "delete_expense_api/" + dataId, //ajax execution to this url
type: 'delete',
data:{
_token:'{{ csrf_token() }}'
},
beforeSend: function () {
},
success: function (data) {
setTimeout(function () {
var oTable = $('#expense_pages_table').dataTable();
oTable.fnDraw(false); //reset datatable
});
}
});
Swal.fire(
'Deleted!',
'Your expense page file has been deleted.',
'success'
)
}
})
});
// delete end
// Show Details
$(document).on('click', '.assign-rider', function () {
    var data_id = $(this).data('id');
    $('#phone').val('');
    $('#email').val('');
    $('#rider_id').val('');
    $('#assign-rider-modal').modal('show');
    $('#order_id').val(data_id);
});
// start contact us edit button update model
$('body').on('click', '.edit-post', function () {
var data_id = $(this).data('id');
// alert(data_id);
$.get('single-expense-table-information/' + data_id, function (data) {
$('#Update_category_model_heading').html("Update expense Page"); //this is title
$('#update-user-btn').val("edit-post");
$('#edit-modal').modal('show');
$('#expense_id').val(data.expense_id);
$('#purpose').val(data.purpose);
$('#vendor').val(data.vendor);
$('#amount').val(data.amount);
$('#expense_date').val(data.expense_date);
var description = (data.description);
$('#description').summernote('code', description);
})
});
// end subcategory edit button update model
// start update contact us  form
if ($("#update_expense").length > 0) {
$("#update_expense").validate({
submitHandler: function (form) {
var actionType = $('#expense_update_submit_button').val();
$('#expense_update_submit_button').html('Sending Request...');
$.ajax({
data: $('#update_expense')
.serialize(), //functions that are used so that values on form-controls such as input, textarea, select etc. can be used in the URL query string when making ajax requests
url: "{{ route('expense.update') }}", //save data url
type: "POST", //because save we use the POST method
dataType: 'json', //the data type we send is JSON
success: function (data) { //if it succeed
$('#update_expense').trigger("reset"); //form reset
$('#edit-modal').modal('hide'); //modal hide
$('#expense_update_submit_button').html('Update expense Page');  //save button
var oTable = $('#expense_pages_table').dataTable(); //initialization datatable
oTable.fnDraw(false); //reset datatable
iziToast.success({ //show iziToast with notification data successfully saved in the lower right position
title: 'expense Page Successfully Updated',
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
$('#expense_update_submit_button').html('Update expense Page');
}
});
}
})
}
// store_contact us
if ($("#store_expense").length > 0) {
$("#store_expense").validate({
submitHandler: function (form) {
var actionType = $('#store_expense_submit_button').val();
$('#store_expense_submit_button').html('Sending Request...');
$.ajax({
data: $('#store_expense')
.serialize(), //functions that are used so that values on form-controls such as input, textarea, select etc. can be used in the URL query string when making ajax requests
url: "{{ route('expense.store') }}", //save data url
type: "POST", //because save we use the POST method
dataType: 'json', //the data type we send is JSON
success: function (data) { //if it succeed
$('#store_expense').trigger("reset"); //form reset
$('#add-modal').modal('hide'); //modal hide
$('#store_expense_submit_button').html('Store expense');  //save button
var oTable = $('#expense_pages_table').dataTable(); //initialization datatable
oTable.fnDraw(false); //reset datatable
iziToast.success({ //show iziToast with notification data successfully saved in the lower right position
title: 'Expense  Successfully Added',
message: '{{ Session('
success ')}}',
position: 'bottomRight'
});
},
error: function (data) { //if an error shows an error on the console
// console.log('Error:', data);
console.log(data.response.data.errors)
$('#purposeError').text(data.dataJSON.errors.purpose);
// alert(data.title);
// $('#titleError').text(data.errors.title);
// alert('Error:',data);
$('#store_expense_submit_button').html('Store expense ');
}
});
}
})
}
</script>
@endsection