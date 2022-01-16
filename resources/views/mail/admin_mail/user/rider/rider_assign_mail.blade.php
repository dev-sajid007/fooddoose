<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Order Request From Admin</title>
	</head>
	<body>
		<h2>Dear Rider - {{$rider_mail['full_name']}}</h2>
		<p>You have received a new order request.</p>
		<p>Your Order Details:</p>
		<ul>
			<li>Your Login address: <a href="https://app.fooddoose.com/rider">login here</a> </li>
			<li>Your Login Email: {{$rider_mail['email_address']}}</li>
			<li>Order ID: {{$rider_mail['order_id']}}</li>
			<li>Total Order Amount:  {{round($rider_mail['total_amount'])}} taka</li>
		</ul>
		<p>Merchant Details:</p>
		<ul>
			<li>Merchant Name: {{$rider_mail['merchant_name']}}</li>
			<li>Merchant Email: {{$rider_mail['merchant_email']}}</li>
			<li>Merchant Phone: {{$rider_mail['merchant_phone']}}</li>
			<li>Merchant Address: {{$rider_mail['merchant_address']}}</li>
			
		</ul>
		<p>Customer Details:</p>
		<ul>
			<li>Customer Name: {{$rider_mail['customer_name']}}</li>
			<li>Customer Email: {{$rider_mail['customer_email']}}</li>
			<li>Customer Phone: {{$rider_mail['customer_phone']}}</li>
			<li>Customer Address: {{$rider_mail['customer_address']}}</li>
			
		</ul>
		<p>Please Contact with merchant immediately.</p>
		<p>If any help needs, please contact: info@fooddoose.com
		or call us at: 01766987945</p>
		<br/>
		<p>Thanks for joining with us.</p>
		<p>Regards</p>
		<p>Fooddoose MANAGEMENT</p>
	</body>
</html>