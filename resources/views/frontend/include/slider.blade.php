<section class="slider-section">
	<div class="owl-carousel owl-theme owl-slider">
		@foreach($select_all_slider as $slider_info)
		<div class="slider-area">
			<img width="100%" height="auto" src="{{asset('frontend_upload_asset/general_settings/slider/'.$slider_info->slider_image)}}" alt="slider">
		</div>
		@endforeach
	</div>
	<div class="marquee-area">
		<div class="container">
			<marquee>
			<h2><a style="color:white" href="http://fooddoose.com">Please Visit fooddoose.com for more info</a></h2>
			</marquee>
		</div>
	</div>
</section>