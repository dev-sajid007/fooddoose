<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>{{$shop_setting->ShopName}}</title>
	<link rel="icon" type="image/x-icon" href="{{asset('frontend_upload_asset/upload_assets/images/favicon/'.$shop_setting->favicon)}}">
	<!--==========Bootstrap.min.css==========-->
	<link rel="stylesheet" href="{{asset('assets/frontend_assets/css/bootstrap.min.css')}}">
	<!--==========Fontawesome css==========-->
	<link rel="stylesheet" href="{{asset('assets/frontend_assets/css/all.css')}}">
	<link rel="stylesheet" href="{{asset('assets/frontend_assets/css/fontawesome.min.css')}}">
	<!--==========Owl.carousel css==========-->
	<link rel="stylesheet" href="{{asset('assets/frontend_assets/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/frontend_assets/css/owl.theme.default.min.css')}}">
	<!--==========Style.css==========-->
	<link rel="stylesheet" href="{{asset('assets/frontend_assets/css/style.css')}}">

	@yield('css')
</head>