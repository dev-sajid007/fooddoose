<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title></title>
	</head>
	<body>
		<h2>Dear
		@if($data['user_type']=='admin')
		Admin -
		@elseif($data['user_type']=='merchant')
		Merchant -
		@elseif($data['user_type']=='rider')
		Rider -
		@endif
		<span style="color:red;">{{$data['full_name']}}</span> ,
		</h2>
		@if($data['user_status']==1)
		<p>We have successfully approved Your account on fooddoose.com</p>
		<p>Your login Details:</p>
		<ul>
			<li>Login address:
				@if($data['user_type']=='admin')
				<a href="https://app.fooddoose.com/login">
				@elseif($data['user_type']=='merchant')
				<a href="https://app.fooddoose.com/merchant">
				@elseif($data['user_type']=='rider')
				<a href="https://app.fooddoose.com/rider">
				@endif
			login here </a>
		</li>
			<li>Login Email: {{$data['email_address']}}</li>
		</ul>
		<p>Please use your email and password to login</p>
		@elseif($data['user_status']==2)
		<p>Your account is pending on fooddoose.com. if you have a question, please contact support</p>
		@elseif($data['user_status']==3)
		<p>Your account is banned on fooddoose.com. if you have a question, please contact support</p>
		@endif
		<p>If any help needs, please contact: info@fooddoose.com
		or call us at: 01766987945</p>
		<br/>
		<p>Thanks for joining with us.</p>
		<p>Regards</p>
		<p>Fooddoose MANAGEMENT</p>
	</body>
</html>