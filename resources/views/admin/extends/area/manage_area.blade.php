@extends('admin.admin_master')
@section('content')
<div class="row mb-1 ml-1">
    <div class="col-md-9 col-sm-12">
        <h5 class="fw-bold text-dark  font-weight-bold"> Area Page Section</h5>
    </div>
    <div class="col-md-3 col-sm-12 text-center">
        <button type="button" class="btn btn-danger float-end  mx-auto" data-bs-toggle="modal" data-bs-target="#add-modal">
        Add Area 
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
                    <table class="table table-white m-0" id="area_table">
                        <thead class="table-header-style">
                            <tr>
                                <th>Area ID</th>
                                <th>Area Name</th>
                                <th>District Name</th>
                                <th>Area Image</th>
                                <th>Area Banner Image</th>
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
@include('admin.extends.area.delete_confirmation')
@include('admin.extends.area.add_area')
@include('admin.extends.area.update_model')
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
$('#area_table').DataTable({
processing: true,
serverSide: true,
responsive: true,
ajax: '{!! route('all_area.list') !!}',
columns: [
{ data: 'area_id', name: 'area.area_id ' },
{ data: 'area_name', name: 'area.area_name' },
{ data: 'district_name', name: 'district.district_name' },
{data: 'area_photo', name: 'area.area_photo',
render: function( data, type, full, meta ) {
return "<img src=\"/frontend_upload_asset/area/image/" + data + "\" height=\"40\" alt='No Image'/>";
}
},
{data: 'area_banner_photo', name: 'area.area_banner_photo',
render: function( data, type, full, meta ) {
return "<img src=\"/frontend_upload_asset/area/banner/" + data + "\" height=\"40\" alt='No Image'/>";
}
},
// { data: 'brand_image', name: 'brand_image' },
{ data: 'created_at', name: 'area.created_at' },
{ data: 'updated_at', name: 'area.updated_at' },
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
url: "delete_area_api/" + dataId, //ajax execution to this url
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
var oTable = $('#area_table').dataTable();
oTable.fnDraw(false); //reset datatable
});
// alert('user successfully deleted');
// swal("User Successfully Deleted");
iziToast.success({ // izitoast warning
title: 'area  successfully deleted',
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
$.get('single-area-information/' + data_id, function (data) {
$('#Update_category_model_heading').html("Update Sub Category"); //this is title
$('#update-user-btn').val("edit-post");
$('#SubCategory_submit_button').html("Update Sub Category");
$('#edit-modal').modal('show');
//set the value of each id based on the data obtained from the ajax get request above
// alert(val(data.id));
$('#area_description').html(data.area_description);
$('#area_id').val(data.area_id);
$('#area_name').val(data.area_name);
$('#district_id').val(data.district_id);
})
});
// end subcategory edit button update model
</script>
@endsection