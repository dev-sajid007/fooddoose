@extends('admin.admin_master')
@section('content')
<style type="text/css">
	.godropdown .go-dropdown-toggle {
    background: #2d3274;
    border: 0px;
    color: #fff;
    padding: 5px 20px;
    font-size: 16px;
    border-radius: 50px;

}

.godropdown .action-list {
    position: absolute;
    top: 100%;
    right: 0px;
    left: auto;
    background: #fff;
    z-index: 99;
    display: none;
    min-width: 180px;
    box-shadow: 3px 3px 6px rgb(0 0 0 / 8%);
}
.godropdown .go-dropdown-toggle i {
    font-size: 11px;
    margin-left: 4px;
}

</style>
<section class="row pt-2">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				
				<table class="table table-sm table-bordered table-striped projects" id="customer_table">
					<thead>
						<tr>
							<th>ID</th>
							<th>Info</th>
							<th>contact</th>
							<th>Created at</th>
							<th>Updated at</th>
							<th width="50px" ><span class="text-middle">Option</span></th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>
@include('admin.extends.user.customer_managment.delete_confirmation')
@include('admin.extends.user.customer_managment.update_model')
@endsection
@section('js')
<script>
$('#customer_table').DataTable({
responsive: true,
processing: true,
serverSide: true,
ajax: '{!! route('all_customer.list') !!}',
fnStateSave: function (oSettings, oData) {
localStorage.setItem('customer_table', JSON.stringify(oData));
},
fnStateLoad: function (oSettings) {
return JSON.parse(localStorage.getItem('customer_table'));
},
columns: [
{ data: 'id', name: 'id' },
{
data: 'first_name',
render: function (full_info) {
return `<p class="d-block font-weight-bold" ><i class="bi bi-person-circle icon text-dark font-weight-bold"></i> <span class="text-danger"> ${full_info.user_first_name} </span>&nbsp;&nbsp;<span class="text-primary font-weight-bold  ">${full_info.user_last_name}</span></p>
<p class=" alert alert-success text-dark"><i class="bi bi-geo-alt-fill text-danger"></i> ${full_info.address}</p>
`
}
},
{
data: 'contact_info',
className: 'text-left',
render: function (contact) {
return `<p class="d-block" >
	<span><i class="bi bi-telephone-forward-fill icon text-danger font-weight-bold"></i>  ${contact.phone}<span>
	</p>
	<br/>
	<p><span><i class="bi bi-envelope-open-fill icon text-danger font-weight-bold"></i>  ${contact.email}</span></p>`
	}
	},
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


  
		// start delete customer------------------------
		$(document).on('click', '.delete', function () {
		dataId = $(this).attr('id');
		// alert(dataId);
		$('#DeleteConfirmation-modal').modal('show');
		});
		$('#record-delete').click(function () {
		$.ajax({
		url: "delete_customer_api/" + dataId, //ajax execution to this url
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
		var oTable = $('#customer_table').dataTable();
		oTable.fnDraw(false); //reset datatable
		});
		// alert('user successfully deleted');
		// swal("User Successfully Deleted");
		iziToast.success({ // izitoast warning
		title: 'Customer  successfully deleted',
		message: '{{ Session('
		delete ')}}',
		position: 'bottomRight'
		});
		}
		})
		});
			
			// end delete customer --------------------------------
				// start subcategory edit button update model
		$('body').on('click', '.edit-post', function () {
		var data_id = $(this).data('id');
		// alert(data_id);
		$.get('single-customer-information/' + data_id, function (data) {
		$('#Update_category_model_heading').html("Update Sub Category"); //this is title
		$('#update-user-btn').val("edit-post");
		$('#SubCategory_submit_button').html("Update Sub Category");
		$('#edit-modal').modal('show');
		//set the value of each id based on the data obtained from the ajax get request above
		// alert(val(data.id));
		$('#address').html(data.address);
		$('#id').val(data.id);
		$('#first_name').val(data.first_name);
		$('#last_name').val(data.last_name);
		$('#email').val(data.email);
		$('#phone').val(data.phone);
		})
		});
			// end subcategory edit button update model
	</script>
	@endsection