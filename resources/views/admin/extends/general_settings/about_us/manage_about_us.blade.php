@extends('admin.admin_master')
@section('content')
<div class="frame-wrap">
	<form name="site_maintenance_form" method="post" action="{{url('/admin/update-about-us')}}" enctype="multipart/form-data" class="mb-2">
		@csrf
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-label"  for="simpleinput">Header</label>
					<input value="{{$select_about_us->header}}" type="text" name="header"  class="form-control" placeholder="Header" required="">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-label"  for="simpleinput">Sub Header</label>
					<input value="{{$select_about_us->sub_header}}" type="text" name="sub_header"  class="form-control" placeholder="Sub Heading" required="">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-label font-weight-bold" for="inputGroupFile01">About Us Image</label>
					<div class="input-group">
						
						<div class="custom-file">
							<input type="file"  name="photo" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" >
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12 mb-5">
				<div class="form-group">
					<label class="form-label"  for="simpleinput">About Us Description</label>
					<textarea id="site_description" name="description" class="form-control site_description" placeholder="description" required="">{!!$select_about_us->description!!} </textarea>
				</div>
			</div>
		</div>
		<button type="submit" class="btn btn-success">Update About Us</button>
	</form>
	<table class="table table-white m-0" id="product_table">
		<thead>
			<tr>
				<th>Image</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><img width="300px" height="auto" src="{{asset('./frontend_upload_asset/upload_assets/general_settings/about_us/'.$select_about_us->photo)}}"></td>
			</tr>
		</tbody>
	</table>
</div>
@endsection
@section('js')
<script type="text/javascript">
	
$(document).ready(function() {
$('.site_description').summernote({
placeholder: 'Enter About Information',
height: 200,
toolbar: [
['style', ['style']],
['font', ['bold', 'underline', 'clear']],
['color', ['color']],
['para', ['ul', 'ol', 'paragraph']],
['table', ['table']],
['insert', ['link', ]],
['view', ['fullscreen', 'codeview', 'help']]
]
});
});
</script>
@endsection