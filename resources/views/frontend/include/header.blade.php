<header>
	<section class="top-menu-section">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<ul class="nav">
						<li class="nav-item"><a href="#" class="nav-link"><i class="fas fa-phone"></i> {{$shop_setting->Phone}}</a></li>
					</ul>
				</div>
				<div class="col-md-8">
					<ul class="nav nav-top-link">

						<li class="nav-item"><a  target="_blank" href="http://fooddoose.com/" class="nav-link"> Foodoose Main Site</a></li>
						@foreach($select_social_link as $select_social_links)
						<li class="top-link"><a target="_blank" href="{{$select_social_links->link}}"><i class="{{$select_social_links->icon}}"></i></a></li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
	</section>
	<!--==========Top Menu End Here==========-->
	<!--==========Main Menu Start Here==========-->
	<section class="main-menu-section">
		<div class="container">
			<div class="main-menu-area">
				<nav class="navbar navbar-expand-lg">
					<div class="logo">
						<a href="{{url('/')}}"><img src="{{asset('assets/frontend_assets/img/logo.png')}}" alt="logo"></a>
					</div>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="bars"><i class="fas fa-bars"></i></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto">
							<li class="nav-item">
								<a class="nav-link" href="{{url('/')}}">Home </a>
							</li>
								<li class="nav-item">
								<a class="nav-link" target="_blank" href="http://fooddoose.com/">Fooddoose Main </a>
							</li>
							
							
						
							
							<li class="nav-item">
								<a class="nav-link" target="_blank" href="http://fooddoose.com/contact-us">Contact Us</a>
							</li>
						</ul>
						<ul class="navbar-nav ">
							
							<li class="my-account">
								<a href=""></a>
							</li>
							<li class="nav-item dropdown my-account">



								<a class="nav-link" href="#">

								Login
								</a>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="{{url('/merchant')}}">Merchant Login</a>
									<a target="_blank" class="dropdown-item" href="https://fooddoose.com/merchant">Merchant Sign Up</a>
										<a class="dropdown-item" href="{{url('rider')}}">Rider Login</a>
										<a target="_blank" class="dropdown-item" href="https://fooddoose.com/raider-page">Rider Sign Up</a>
										<a  class="dropdown-item" href="#">Forget Password</a>
								</div>
							</li>
							<!-- 	<li class="my-account">
									<a href="{{url('/customer-login')}}">Login</a>
							</li> -->
						</ul>
					</div>
				</nav>
			</div>
		</div>
	</section>
</header>