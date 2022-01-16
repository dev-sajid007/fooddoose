@extends('admin.main_page')
@section('content')
<div class="frame-wrap">
	<img width="200px" height="auto"   src="{{asset('frontend_upload_asset/general_settings/slider/'.$select_single_slider->slider_image)}}">
	<form name="slider_image_form" method="post" action="{{url('Admin/update-slider')}}" enctype="multipart/form-data">
		@csrf
		<input type="hidden" name="slider_id" value="{{$select_single_slider->slider_id}}" name="">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label class="form-label"  for="simpleinput">Header 1</label>
					<input value="{{$select_single_slider->header_1}}" name="header_1" type="text"  class="form-control" placeholder="Header 1">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="form-label"  for="simpleinput">Header 2</label>
					<input value="{{$select_single_slider->header_2}}" name="header_2" type="text"  class="form-control" placeholder="Header 2">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="form-label"  for="simpleinput">Slider Link</label>
					<input value="{{$select_single_slider->slider_link}}" type="text" name="slider_link" class="form-control" placeholder="Slider Link">
				</div>
				
			</div>
			<div class="col-md-6">
				
				<div class="form-group">
					<label class="form-label"  for="simpleinput">Button Text</label>
					<input value="{{$select_single_slider->button_text}}" type="text" name="button_text" class="form-control" placeholder="Button Text">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label class="form-label" for="example-palaceholder">Slider Image</label>
					<input type="file"  name="slider_immage" class="form-control" placeholder="Slider Image">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="form-label" for="">Select Language</label>
					<div class="form-group">
						<div class="input-group">
							<select class="custom-select " name="language"  id="language" required="">
								
								
								<option value="1" selected="">Bangla</option>
								<option value="2">English</option>
								
							</select>
							<div class="input-group-append">
								<label class="input-group-text" for="">Language</label>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
		
		<div class="form-group">
			<label class="form-label" for="example-textarea">Text area</label>
			<textarea type="text"  name="slider_details" class="form-control" id="example-textarea" rows="5">{{$select_single_slider->slider_details}}</textarea>
		</div>
		
		
		<input type="submit" name="" value="Update Slider">
		
		
		
	</form>
</div>
@endsection
@section('js')
<script type="text/javascript">
	
	document.forms['slider_image_form'].elements['language'].value={{$select_single_slider->language}};
</script>
@endsection