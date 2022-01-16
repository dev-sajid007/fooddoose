@extends('admin.admin_master')
@section('content')
<div class="frame-wrap">
	<form name="shop_setting_form" method="post" action="{{url('/admin/update-shop-setting')}}" enctype="multipart/form-data">
		@csrf
		<input type="hidden" name="ShopID" value="{{$shop_setting->ShopID}}">
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-label"  for="simpleinput">Website Name</label>
					<input value="{{$shop_setting->ShopName}}" type="text" name="ShopName" id="simpleinput" class="form-control" placeholder="Shop Name" required="">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-label"  for="simpleinput">Website Heading</label>
					<input value="{{$shop_setting->Heading}}" type="text" name="Heading" id="simpleinput" class="form-control" placeholder="Heading" required="">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-label"  for="simpleinput">Website Email 1</label>
					<input value="{{$shop_setting->Email}}" type="email" name="Email" id="simpleinput" class="form-control" placeholder="Email" required="">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-label"  for="simpleinput">Website Email 2</label>
					<input value="{{$shop_setting->Email_2}}" type="email" name="Email_2"  class="form-control" placeholder="Email 2" required="">
				</div>
			</div>
			
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-label"  for="simpleinput">Website Phone 1</label>
					<input value="{{$shop_setting->Phone}}" type="text" name="Phone" id="simpleinput" class="form-control" placeholder="Phone Number 1" required="">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-label"  for="simpleinput">Website Phone 2</label>
					<input value="{{$shop_setting->Phone_2}}" type="text" name="Phone_2" id="simpleinput" class="form-control" placeholder="Phone Number 2" required="">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-label"  for="simpleinput">Website App Link</label>
					<input value="{{$shop_setting->app_link}}" type="text" name="app_link" id="simpleinput" class="form-control" placeholder="https://play.google.com/link" required="">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-label"  for="simpleinput">Website Address</label>
					<input value="{{$shop_setting->Address}}" type="text" name="Address" id="simpleinput" class="form-control" placeholder="Address" required="">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-label"  for="simpleinput">Website</label>
					<input value="{{$shop_setting->Website}}" type="text" name="Website" id="simpleinput" class="form-control" placeholder="https://www.google.com" required="">
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<label class="form-label"  for="simpleinput">Company Details</label>
					<textarea name="company_details" class="form-control summernote" placeholder="Location Info 1" >{!!$shop_setting->company_details!!} </textarea>
					
				</div>
			</div>
			<div class="col-md-6 mb-2" >
				<div class="form-group">
					<label class="form-label" for="inputGroupFile01">Website Logo</label>
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
						</div>
						<div class="custom-file">
							<input type="file"  name="logo" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" >
							<label class="custom-file-label" for="inputGroupFile01">Choose file</label>
						</div>
					</div>
					<span class="help-block">Some help content goes here</span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="form-label" for="inputGroupFile01">Website Favicon</label>
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
						</div>
						<div class="custom-file">
							<input type="file"  name="favicon" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" >
							<label class="custom-file-label" for="inputGroupFile01">Choose file</label>
						</div>
					</div>
					<span class="help-block">Some help content goes here</span>
				</div>
			</div>
		</div>
		<button type="submit" class="btn btn-success">Update Shop Setting</button>
	</form>
	<table class="table table-white m-0" id="product_table">
		<thead>
			<tr>
				<th>Logo</th>
				<th>Favicon Image</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><img width="300px" height="auto" src="{{asset('./frontend_upload_asset/upload_assets/images/logo/'.$shop_setting->Image)}}"></td>
				<td><img width="300px" height="auto" src="{{asset('./frontend_upload_asset/upload_assets/images/favicon/'.$shop_setting->favicon)}}"></td>
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