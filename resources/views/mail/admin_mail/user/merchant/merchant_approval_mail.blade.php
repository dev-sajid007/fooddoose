<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title></title>
	</head>
	<body>
		<h2>Dear {{$data['first_name']}} {{$data['last_name']}},</h2>
		<p>We have successfully approved Your account on fooddoose.com</p>
		<p>Your login Details:</p>
		<ul>
			<li>Login address: <a href="https://app.fooddoose.com/merchant">login here</a> </li>
			<li>Login Email: {{$data['email_address']}}</li>
		</ul>
		<p>Please use your email and password to login</p>
		<p>If any help needs, please contact: info@fooddoose.com
		or call us at: 01766987945</p>
		<br/>
		<p>Thanks for joining with us.</p>
		<p>Regards</p>
		<p>Fooddoose MANAGEMENT</p>
	</body>
</html>