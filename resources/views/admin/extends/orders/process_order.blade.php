@extends('admin.admin_master')
@section('content')
<div class="row mb-1 ml-1">
    <div class="col-md-9 col-sm-12">
        <h5 class="fw-bold text-dark  font-weight-bold">Progress Order Page Section</h5>
    </div>
    <div class="col-md-3 col-sm-12 text-center">
        {{-- <button type="button" class="btn btn-danger float-end  mx-auto" data-bs-toggle="modal" data-bs-target="#add-modal">
        Add Order Page
        </button> --}}
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
                <h5 class="fw-bold"> order Page Section</h5>
            </div> -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-white m-0" id="order_pages_table">
                        <thead class="table-header-style">
                            <tr>
                                <th>Order ID</th>
                                <th>Order No</th>
                                <th>Customer</th>
                                <th>Contact No</th>
                                <th>Subtotal</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Transaction No</th>
                                {{-- <th>Delivery Type</th>
                                <th>Delivery Address</th>
                                <th>Delivery Charge</th> --}}
                                <th>Created at</th>
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
@include('admin.extends.orders.show_model')
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
$('#order_pages_table').DataTable({
processing: true,
serverSide: true,
responsive: true,
ajax: '{!! route('process_orders.list') !!}',
columns: [
{ data: 'id', name: 'id' },
{ data: 'order_No', name: 'order_No' },
{ data: 'customer_name', name: 'customer_name' },
{ data: 'contact_no', name: 'contact_no' },
{ data: 'subtotal', name: 'subtotal' },
{ data: 'total', name: 'total' },
{ data: 'status', name: 'status' },
{ data: 'transaction_no', name: 'transaction_no' },
// { data: 'delivery_type', name: 'delivery_type' },
// { data: 'delivery_address', name: 'delivery_address' },
// { data: 'delivery_charge', name: 'delivery_charge' },
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
url: "delete_order_api/" + dataId, //ajax execution to this url
type: 'delete',
data:{
_token:'{{ csrf_token() }}'
},
beforeSend: function () {
},
success: function (data) {
setTimeout(function () {
var oTable = $('#order_pages_table').dataTable();
oTable.fnDraw(false); //reset datatable
});
}
});
Swal.fire(
'Deleted!',
'Your order page file has been deleted.',
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
$.get('/admin/single-order-table-information/' + data_id, function (data) {
$('#Update_category_model_heading').html("Update order Page"); //this is title
$('#update-user-btn').val("edit-post");
$('#edit-modal').modal('show');
$('#id').val(data.id);
$('#status').val(data.status);

})
});
// end subcategory edit button update model
// start contact us edit button update model
$('body').on('click', '.edit-post', function () {
var data_id = $(this).data('id');
// alert(data_id);
$.get('/admin/single-order-table-information/' + data_id, function (data) {
$('#Update_category_model_heading').html("Update order Page"); //this is title
$('#update-user-btn').val("edit-post");
$('#edit-modal').modal('show');
$('#id').val(data.order_info.id);
$('#status').val(data.order_info.status);
$('#customer_name_view').html(data.order_info.customer_name);
$('#customer_email_view').html(data.order_info.email);
$('#customer_phone_view').html(data.order_info.contact_no);
$('#customer_address_view').html(data.order_info.delivery_address);
$('#total_delivery_charge_view').html(Math.round(data.order_info.delivery_charge));
$('#total_amount_view').html(Math.round(data.order_info.total));
$('#total_quantity_view').html(Math.round(data.order_info.total));
// rider info start
if(data.rider_info==null){
$("#full_rider_info").hide();
}
else{
$("#full_rider_info").show();
$('#rider_name_view').html(data.rider_info.name);
$('#rider_email_view').html(data.rider_info.email);
$('#rider_phone_view').html(data.rider_info.phone);
$('#rider_id_view').html(data.rider_info.id);
}
// end
$('#OrderTableBody').empty();
var List =JSON.parse(data.order_mapping);
// var List =(data.order_mapping);
// console.log(List);
// exit();
for(i=0;i<List.length;i++)
    {
    $('#OrderTableBody').append('<tr><td>'+i+'</td><td>'+List[i].order_id+'</td><td>'+List[i].name+'</td><td>'+List[i].quantity+'</td><td>'+Math.round(List[i].price)+'</td><td>'+Math.round(List[i].price*List[i].quantity)+'</td></tr>');
    }
    if(data.extra_item !=null){
    
    // $('#OrderTableBodyExtraItem').html('');
    $('#OrderTableBodyExtraItem').val('');
    $("#full_details_extra_item").show();
    var ExtraItem =(data.extra_item);
    console.log(ExtraItem);
    for(i=0;i<ExtraItem.length;i++)
    {
    $('#OrderTableBodyExtraItem').append('<tr><td>'+ExtraItem[i].serial_num+'</td><td>'+ExtraItem[i].order_extra_item_id+'</td><td>'+ExtraItem[i].order_extra_item_name+'</td><td>'+ExtraItem[i].food_name+'</td><td>'+ExtraItem[i].quantity+'</td><td>'+ExtraItem[i].price+'</td><td>'+ExtraItem[i].price*ExtraItem[i].quantity+'</td></tr>');
    }
    }
    else{
    $("#full_details_extra_item").hide();
    }
    
    })
    });
</script>
@endsection