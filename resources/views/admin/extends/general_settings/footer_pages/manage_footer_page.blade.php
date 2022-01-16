@extends('admin.admin_master')
@section('content')
<div class="row mb-1 ml-1">
    <div class="col-md-9 col-sm-12">
        <h5 class="fw-bold text-dark  font-weight-bold"> Footer Page Section</h5>
    </div>
    <div class="col-md-3 col-sm-12 text-center">
        <button type="button" class="btn btn-danger float-end  mx-auto" data-bs-toggle="modal" data-bs-target="#add-modal">
        Add Footer Page
        </button>
    </div>
</div>
<div class="row">
    <div class="col-md-12 mb-3">
        <div class="card">
            <!-- <div class="card-header">
                <h5 class="fw-bold"> Footer Page Section</h5>
            </div> -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-white m-0" id="footer_pages_table">
                        <thead class="table-header-style">
                            <tr>
                                <th>ID</th>
                                <th>title</th>
                                <th>Header</th>
                                <th>Sub Header</th>
                                <th>Position</th>
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
<div class="row ">
    
</div>
@include('admin.extends.general_settings.footer_pages.add_footer_page')
@include('admin.extends.general_settings.footer_pages.update_model')
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
$('#footer_pages_table').DataTable({
processing: true,
serverSide: true,
responsive: true,
ajax: '{!! route('all_footer_pages.list') !!}',
columns: [
{ data: 'footer_page_id', name: 'footer_page_id' },
{ data: 'title', name: 'title' },
{ data: 'header', name: 'header' },
{ data: 'sub_header', name: 'sub_header' },
{ data: 'position', name: 'position' },
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
url: "delete_footer_page_api/" + dataId, //ajax execution to this url
type: 'delete',
data:{
_token:'{{ csrf_token() }}'
},
beforeSend: function () {
},
success: function (data) {
setTimeout(function () {
var oTable = $('#footer_pages_table').dataTable();
oTable.fnDraw(false); //reset datatable
});
}
});
Swal.fire(
'Deleted!',
'Your footer page file has been deleted.',
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
$.get('single-footer-page-table-information/' + data_id, function (data) {
$('#Update_category_model_heading').html("Update Footer Page"); //this is title
$('#update-user-btn').val("edit-post");
$('#edit-modal').modal('show'); 
$('#footer_page_id').val(data.footer_page_id);
$('#title').val(data.title);
$('#meta_tags').val(data.meta_tags);
$('#header').val(data.header);
$('#sub_header').val(data.sub_header);
// $('#description').html(data.description);
$('#position').val(data.position);
$('#language').val(data.language);
var footer_details = (data.description);
$('#description').summernote('code', footer_details);
})
});
// end subcategory edit button update model
// start update contact us  form
if ($("#update_or_create_from").length > 0) {
$("#update_or_create_from").validate({
submitHandler: function (form) {
var actionType = $('#contact_us_submit_button').val();
$('#contact_us_submit_button').html('Sending Request...');
$.ajax({
data: $('#update_or_create_from')
.serialize(), //functions that are used so that values on form-controls such as input, textarea, select etc. can be used in the URL query string when making ajax requests
url: "{{ route('footer_pages.update') }}", //save data url
type: "POST", //because save we use the POST method
dataType: 'json', //the data type we send is JSON
success: function (data) { //if it succeed
$('#update_or_create_from').trigger("reset"); //form reset
$('#edit-modal').modal('hide'); //modal hide
$('#contact_us_submit_button').html('Update Contact Us');  //save button
var oTable = $('#footer_pages_table').dataTable(); //initialization datatable
oTable.fnDraw(false); //reset datatable
iziToast.success({ //show iziToast with notification data successfully saved in the lower right position
title: 'Footer Page Successfully Updated',
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
$('#contact_us_submit_button').html('Update Footer Page');
}
});
}
})
}
// store_contact us
if ($("#store_contact_us").length > 0) {
$("#store_contact_us").validate({
submitHandler: function (form) {
var actionType = $('#store_contact_us_submit_button').val();
$('#store_contact_us_submit_button').html('Sending Request...');
$.ajax({
data: $('#store_contact_us')
.serialize(), //functions that are used so that values on form-controls such as input, textarea, select etc. can be used in the URL query string when making ajax requests
url: "{{ route('footer_page.store') }}", //save data url
type: "POST", //because save we use the POST method
dataType: 'json', //the data type we send is JSON
success: function (data) { //if it succeed
$('#store_contact_us').trigger("reset"); //form reset
$('#add-modal').modal('hide'); //modal hide
$('#store_contact_us_submit_button').html('Update Contact Us');  //save button
var oTable = $('#footer_pages_table').dataTable(); //initialization datatable
oTable.fnDraw(false); //reset datatable
iziToast.success({ //show iziToast with notification data successfully saved in the lower right position
title: 'Footer Page Successfully Added',
message: '{{ Session('
success ')}}',
position: 'bottomRight'
});
},
error: function (data) { //if an error shows an error on the console
// console.log('Error:', data);
console.log(data.response.data.errors)
$('#titleError').text(data.dataJSON.errors.title);
// alert(data.title);
// $('#titleError').text(data.errors.title);
// alert('Error:',data);
$('#store_contact_us_submit_button').html('Store Footer Page Us');
}
});
}
})
}
</script>
@endsection