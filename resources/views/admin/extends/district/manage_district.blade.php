@extends('admin.admin_master')
@section('content')
<div class="row mb-1 ml-1">
    <div class="col-md-9 col-sm-12">
        <h5 class="fw-bold text-dark  font-weight-bold"> District Page Section</h5>
    </div>
    <div class="col-md-3 col-sm-12 text-center">
        <button type="button" class="btn btn-danger float-end  mx-auto" data-bs-toggle="modal" data-bs-target="#add-modal">
        District Managment
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
                    <table class="table table-white m-0" id="manufacturer">
                        <thead class="table-header-style">
                            <tr>
                                <th>District ID</th>
                                <th>District Name</th>
                                <th>District Image</th>
                                <th>District Banner Image</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.extends.district.delete_confirmation')
@include('admin.extends.district.add_district')
@include('admin.extends.district.update_model')
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
$('#manufacturer').DataTable({
processing: true,
serverSide: true,
responsive: true,
ajax: '{!! route('all_district.list') !!}',
columns: [
{ data: 'district_id', name: 'district_id ' },
{ data: 'district_name', name: 'district_name' },
{data: 'district_photo', name: 'district_photo',
render: function( data, type, full, meta ) {
return "<img src=\"/frontend_upload_asset/district/image/" + data + "\" height=\"40\" alt='No Image'/>";
}
},
{data: 'district_banner_photo', name: 'district_banner_photo',
render: function( data, type, full, meta ) {
return "<img src=\"/frontend_upload_asset/district/banner/" + data + "\" height=\"40\" alt='No Image'/>";
}
},
// { data: 'brand_image', name: 'brand_image' },
{ data: 'created_at', name: 'created_at' },
{ data: 'updated_at', name: 'updated_at' },
{ data: 'action', name: 'action' },
],
order: [
[0, 'desc']
],
language : {
processing: '<img src="{{asset('assets/admin_assets/images/1564224329loading3.gif')}}">'
},
dom: 'Blfrtip',
buttons: [
'copy', 'csv', 'excel', 'pdf', 'print'
]
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
url: "delete_district_api/" + dataId, //ajax execution to this url
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
var oTable = $('#manufacturer').dataTable();
oTable.fnDraw(false); //reset datatable
});
// alert('user successfully deleted');
// swal("User Successfully Deleted");
iziToast.success({ // izitoast warning
title: 'manufacturer  successfully deleted',
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
$.get('single-district-information/' + data_id, function (data) {
$('#Update_category_model_heading').html("Update Sub Category"); //this is title
$('#update-user-btn').val("edit-post");
$('#SubCategory_submit_button').html("Update Sub Category");
$('#edit-modal').modal('show');
//set the value of each id based on the data obtained from the ajax get request above
// alert(val(data.id));
$('#district_details').html(data.district_details);
$('#district_id').val(data.district_id);
$('#district_name').val(data.district_name);
})
});
// end subcategory edit button update model
</script>
@endsection