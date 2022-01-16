@extends('admin.admin_master')
@section('content')
<div class="frame-wrap">
	<form  class="mb-2" name="shop_setting_form" method="post" action="{{url('/admin/update-admin-dashboard-setting')}}" enctype="multipart/form-data">
		@csrf
		<input type="hidden" name="admin_dashboard_id" value="{{$admin_dashboard->admin_dashboard_id}}">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label class="form-label"  for="simpleinput">Dashboard Title</label>
					<input value="{{$admin_dashboard->title}}" type="text" name="title"  class="form-control" placeholder="Dashboard Title" required="">
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label class="form-label"  for="simpleinput">Dashboard Name</label>
					<input value="{{$admin_dashboard->dashboard_name}}" type="text" name="dashboard_name"  class="form-control" placeholder="Dashboard Name" required="">
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label class="form-label"  for="simpleinput">Dashboard Short Name</label>
					<input value="{{$admin_dashboard->short_char_title}}" type="text" name="short_char_title"  class="form-control" placeholder="Dashboard Short Name" required="">
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label class="form-label"  for="simpleinput">Footer Greeting</label>
					<input value="{{$admin_dashboard->footer_greeting}}" type="text" name="footer_greeting"  class="form-control" placeholder="Footer Greeting" required="">
				</div>
			</div>
			
			
			
			<div class="col-md-6">
				<div class="form-group">
					<label class="form-label"  >Logo</label>
					<input  name="logo" type="file"  class="form-control" placeholder="Logo">
				</div>
				
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="form-label"  >Favicon</label>
					<input  name="favicon" type="file"  class="form-control" placeholder="Favicon">
				</div>
				
			</div>
		</div>
		<button type="submit" class="btn btn-success">Update Shop Setting</button>
	</form>
	<table class="table table-white m-0" id="product_table">
		<thead>
			<tr>
				<th>Logo</th>
				<th>favicon</th>
				
			</tr>
		</thead>
		<tbody>
			<tr>
				
				<td><img width="300px" height="auto" src="{{asset('./frontend_upload_asset/upload_assets/images/logo/'.$admin_dashboard->logo)}}"></td>
				<td><img width="300px" height="auto" src="{{asset('./frontend_upload_asset/upload_assets/images/favicon/'.$admin_dashboard->favicon)}}"></td>
			</tr>
		</tbody>
	</table>
</div>
@endsection
@section('js')
<script type="text/javascript">
	
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
</script>
@endsection