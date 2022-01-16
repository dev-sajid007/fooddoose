<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Foodoose Rider</title>
		<link rel="stylesheet" href="{{asset('assets/auth_asset/rider_auth_system/bootstrap/bootstrap.min.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/auth_asset/rider_auth_system/style.css')}}" />
		<style>
		.from-parent {
		min-height: 100vh;
		}
		</style>
	</head>
	<body id="login">
		<div class="container">
			<div class="row">
				<div class="col mx-auto col-12 col-md-10 col-lg-6 col-xl-4
					from-parent align-items-center d-flex">
					<form method="post" action="{{url('rider-login')}}" class="border p-3 w-100 bg-white rounded-2 py-5">
						<h1 class="mb-4 text-center" style="color: #f46f22">
						<span class="text-danger font-weight-bold">Foodoose</span> <br><p style="font-size:22px;margin-top:10px">Rider Login</p> 
						</h1>
						@if ($message = Session::get('warning'))
						<div class="alert alert-danger alert-dismissible fade show">
							<strong>Alert!</strong> {{ $message }}
							<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
						</div>
						@endif
						@if ($message = Session::get('success'))
						<div class="alert alert-success alert-dismissible fade show">
							<strong>Alert!</strong> {{ $message }}
							<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
						</div>
						@endif
						@csrf
						<div class="my-3 w-100">
							<label for="email" class="form-label">Email :</label>
							<input type="email" name="email" class="form-control" id="email" placeholder="Your Email" />
							@error('email')
							<span class="text-danger" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
						<div class="my-3 w-100">
							<label for="password" class="form-label">Password :</label>
							<input name="password" type="password" class="form-control" id="password" placeholder="Password" />
							@error('password')
							<span class="text-danger" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
						<button
						type="submit"
						style="background: #f46f22; width: 100%"
						class="btn px-4 ml-md-4 ml-0 mt-md-0 mt-3 text-white"
						>
						LOGIN
						</button>
					</form>
				</div>
			</div>
		</div>
		<script src="{{asset('assets/auth_asset/rider_auth_system/bootstrap/bootstrap.bundle.min.js')}}"></script>
	</body>
</html>
