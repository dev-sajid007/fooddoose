@extends('admin.admin_master')
@section('content')
<div class="row mb-1 ml-1">
    <div class="col-md-9 col-sm-12">
        <h5 class="fw-bold text-dark  font-weight-bold"> Salary Page Section</h5>
    </div>
    <div class="col-md-3 col-sm-12 text-center">

        <a href="{{ route('store.salary.view') }}" class="btn btn-danger float-end  mx-auto" >

        Add Salary 
        </a>
    </div>
</div>
<div class="row">
    <div class="col-md-12 mb-3">
        <div class="card">
            <!-- <div class="card-header">
                <h5 class="fw-bold"> salary Page Section</h5>
            </div> -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-white m-0" id="salary_pages_table">
                        <thead class="table-header-style">
                            <tr>
                                <th>ID</th>
                                <th>Pay Date</th>
                                <th>Employe Name</th>
                                <th>Salary Type</th>
                                <th>Pay System</th>
                                <th>Pay Method</th>
                                <th>Year</th>
                                <th>Month</th>
                                <th>Amount</th>
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
{{-- @include('admin.extends.accounts.salary.add_salary')
@include('admin.extends.accounts.salary.update_model') --}}
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
$('#salary_pages_table').DataTable({
processing: true,
serverSide: true,
responsive: true,
ajax: '{!! route('all_salaries.list') !!}',
columns: [
{ data: 'id', name: 'id' },
{ data: 'pay_date', name: 'pay_date' },

{ data: 'name', name: 'employees.name' },
{ data: 'salary_type', name: 'salary_type' },
{ data: 'pay_system', name: 'pay_system' },
{ data: 'pay_method', name: 'pay_method' },
{ data: 'year', name: 'year' },
{ data: 'month', name: 'month' },
{ data: 'amount', name: 'amount' },
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
url: "delete_salary_api/" + dataId, //ajax execution to this url
type: 'delete',
data:{
_token:'{{ csrf_token() }}'
},
beforeSend: function () {
},
success: function (data) {
setTimeout(function () {
var oTable = $('#salary_pages_table').dataTable();
oTable.fnDraw(false); //reset datatable
});
}
});
Swal.fire(
'Deleted!',
'Your salary page file has been deleted.',
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
$.get('single-salary-table-information/' + data_id, function (data) {
$('#Update_category_model_heading').html("Update salary Page"); //this is title
$('#update-user-btn').val("edit-post");
$('#edit-modal').modal('show');
$('#id').val(data.id);
$('#purpose').val(data.purpose);
$('#vendor').val(data.vendor);
$('#amount').val(data.amount);
$('#salary_date').val(data.salary_date);
var description = (data.description);
$('#description').summernote('code', description);
})
});
// end subcategory edit button update model
// start update contact us  form
if ($("#update_salary").length > 0) {
$("#update_salary").validate({
submitHandler: function (form) {
var actionType = $('#salary_update_submit_button').val();
$('#salary_update_submit_button').html('Sending Request...');
$.ajax({
data: $('#update_salary')
.serialize(), //functions that are used so that values on form-controls such as input, textarea, select etc. can be used in the URL query string when making ajax requests
url: "", //save data url
type: "POST", //because save we use the POST method
dataType: 'json', //the data type we send is JSON
success: function (data) { //if it succeed
$('#update_salary').trigger("reset"); //form reset
$('#edit-modal').modal('hide'); //modal hide
$('#salary_update_submit_button').html('Update salary Page');  //save button
var oTable = $('#salary_pages_table').dataTable(); //initialization datatable
oTable.fnDraw(false); //reset datatable
iziToast.success({ //show iziToast with notification data successfully saved in the lower right position
title: 'salary Page Successfully Updated',
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
$('#salary_update_submit_button').html('Update salary Page');
}
});
}
})
}
// store_contact us
if ($("#store_salary").length > 0) {
$("#store_salary").validate({
submitHandler: function (form) {
var actionType = $('#store_salary_submit_button').val();
$('#store_salary_submit_button').html('Sending Request...');
$.ajax({
data: $('#store_salary')
.serialize(), //functions that are used so that values on form-controls such as input, textarea, select etc. can be used in the URL query string when making ajax requests
url: "", //save data url
type: "POST", //because save we use the POST method
dataType: 'json', //the data type we send is JSON
success: function (data) { //if it succeed
$('#store_salary').trigger("reset"); //form reset
$('#add-modal').modal('hide'); //modal hide
$('#store_salary_submit_button').html('Store salary');  //save button
var oTable = $('#salary_pages_table').dataTable(); //initialization datatable
oTable.fnDraw(false); //reset datatable
iziToast.success({ //show iziToast with notification data successfully saved in the lower right position
title: 'salary  Successfully Added',
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
$('#store_salary_submit_button').html('Store salary ');
}
});
}
})
}
</script>
@endsection