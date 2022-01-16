@extends('admin.admin_master')
@section('content')
<div class="frame-wrap">
	<img width="200px" height="auto"   src="{{asset('frontend_upload_asset/general_settings/slider/'.$select_single_slider->slider_image)}}">
	<form method="post" action="{{url('admin/update-slider')}}" enctype="multipart/form-data">
		@csrf
		<input type="hidden" name="slider_id" value="{{$select_single_slider->slider_id}}" name="">
		<div class="form-group">
			<label class="form-label" name="slider_link" for="simpleinput">Slider Link</label>
			<input value="{{$select_single_slider->slider_link}}" type="text" id="simpleinput" class="form-control" placeholder="Slider Link">
		</div>
		
		
		<div class="form-group">
			<label class="form-label" for="example-palaceholder">Placeholder</label>
			<input type="file"  name="slider_immage" id="example-palaceholder" class="form-control" placeholder="placeholder">
		</div>
		<div class="form-group">
			<label class="form-label" for="example-textarea">Text area</label>
			<textarea type="text"  name="slider_details" class="form-control" id="example-textarea" rows="5">{{$select_single_slider->slider_details}}</textarea>
		</div>
		
		<input type="submit" name="" value="Update Slider">
		
		
		
	</form>
</div>
@endsection