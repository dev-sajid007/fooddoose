<?php
namespace App\Http\Controllers\FrontEnd;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use DB;
use Mail;
use PDF;
use App\Models\Frontend\CustomerVerifyModel;
class OrderController extends Controller
{
public function VerifyOTP(Request $request){
// dd($request->all());
$data = new CustomerVerifyModel;
$validate = Validator::make($request->all(), $data->validation());
if ($validate->fails()) {
return response()->json(['error'=>201, 'response'=>$validate->errors()]);
}
$verify_code = rand(1000,9999);
$phone_number = $request->country_code . $request->phone;
$get_data=DB::table('customer_verify')->where('email','=',$request->email)->first();
if ($get_data) {
DB::table('customer_verify')
->where('email', $request->email)
->update(['verify_code' =>$verify_code ]);
}
else {
DB::table('customer_verify')->insert([
'name' => $request->name,
'phone' => $request->phone,
'email'=>$request->email,
'address'=>$request->address,
'verify_code'=>$verify_code,
'created_at' => date('Y-m-d H:i:s'),
'updated_at' => date('Y-m-d H:i:s'),
]);
}
if ($request->verify_code_type == 2) {
$account_sid = 'ACec754d678034ad30d472ea4a8e105060';
$auth_token = 'b560e8443cac9e0d44caffeae7676d39';
$twilio_number = '+13347083175';
$client = new Client($account_sid, $auth_token);
$client->messages->create($phone_number, ['from' => $twilio_number, 'body' => 'Fooddoose Verify code : ' . $verify_code]);
}
else {
$to_name = $request->name;
$to_email = $request->email;
$data = array('verify_code' => $verify_code);
Mail::send('frontend.mail.verify_code', $data, function($message) use ($to_name, $to_email) {
$message->to($to_email, $to_name)
->subject('Verification Code');
$message->from('info@fooddoose.com','FoodDoose');
});
return ('email sent successfully');
}
}
public function Confirm_Order(Request $request){
$validatedData = $request->validate([
'customer_name' => 'required|max:60',
'email' => 'required|max:70',
'contact_no' => 'required|max:20',
'delivery_address'=>'required',
'verify_code'=>'required',
]);
// dd($request->all());
$input=$request->all();
	// dd($input["email"]);
$get_data=DB::table('customer_verify')->where('email','=',$input["email"])->first();
// dd($get_data);
// dd($get_data);
if ( $get_data==null) {
// return view('frontend.extend.order.confirmation_faild');
	return response()->json(['message'=>'invalid otp address','status'=>0]);
}
elseif ($input["verify_code"] != $get_data->verify_code) {
	return response()->json(['message'=>'invalid attempts','status'=>0]);
}
// dd($request->all());
$requested_data=array();

$select_rastaurant=DB::table('restaurant')->where('restaurant_id','=',$input["restaurant_id"])->first();

if($select_rastaurant ==null){
    $merchant_user_id=0;
$merchant_rastaurant_id=0;

}

else{
$merchant_user_id=$select_rastaurant->user_id;
$merchant_rastaurant_id=$select_rastaurant->restaurant_id;
}





	// $input  = $request->json()->all();
	// dd($input);
	$requested_data['customer_name'] = $input["customer_name"];
	$requested_data['contact_no'] = $input["contact_no"];
	$requested_data['email'] = $input["email"];
	$requested_data['delivery_address'] = $input["delivery_address"];
	$requested_data['subtotal'] = $input["total"]+$input["delivery_charge"];
	$requested_data['total'] = $input["total"]+$input["delivery_charge"];
	$requested_data['delivery_charge'] = $input["delivery_charge"];
	$requested_data['user_id'] = $input["user_id"];
	if($requested_data['user_id']==null){
	    
	    $user_id=0;
	}
	
	else{
	    
	    $user_id=$requested_data['user_id'];
	}
	
	
	
	$order_table = array('customer_name' => $requested_data['customer_name'],
	'user_id' => $user_id,
	'merchant_id' => $merchant_user_id,
	'status' => 'created',
	'restaurant_id' => $merchant_rastaurant_id,
	'order_No' => rand(100000,1000000),
	'contact_no' => $requested_data['contact_no'],
	'email' => $requested_data['email'],
	'delivery_address' => $requested_data['delivery_address'],
	'delivery_address' => $input["delivery_address"],
	'delivery_charge' =>$requested_data['delivery_charge'],
	'total' => $requested_data['total'],
	'subtotal' => $requested_data['total'],
	"created_at" => date('Y-m-d H:i:s'),
	"updated_at" => date('Y-m-d H:i:s')
	);
	$order_id=DB::table('orders')->insertGetId($order_table);
// DB::table('orders')->insertGetId($order_table);
	// dd($order_id);
	
	
	// $select_latest_order_table=DB::table('orders')->latest()->first();
	foreach($input['Cartlist'] as $cartdata){
	
	$select_food_info=DB::table('food')->where('id','=',$cartdata['food_id'])->latest()->first();
	$order_product_mapping_table = array('order_id' => $order_id,
	'food_id' => $select_food_info->id,
	'price' => $select_food_info->price,
	'quantity' =>$cartdata['food_quantity'] ,
	'total_price' => $select_food_info->price* $cartdata['food_quantity'],
	// 'discount' =>  $cartdata['discount'],
	"created_at" => date('Y-m-d H:i:s'),
	"updated_at" => date('Y-m-d H:i:s')
		);
	DB::table('order_food')->insert($order_product_mapping_table);
	foreach($input['ExtraCart'] as $extra_cart_data){
		if ($select_food_info->id==$extra_cart_data["food_id"]) {
	$extra_order_item = array('order_id' => $order_id,
	'food_id' => $select_food_info->id,
	'extra_item_id' => $extra_cart_data["extra_item_id"],
	'price' => $extra_cart_data["extra_item_price"],
	'quantity' =>$extra_cart_data['extra_item_quantity'] ,
	'total_price' => $extra_cart_data["extra_item_price"]* $extra_cart_data['extra_item_quantity'],
	"created_at" => date('Y-m-d H:i:s'),
	"updated_at" => date('Y-m-d H:i:s')
		);
	DB::table('order_extra_item')->insert($extra_order_item);
		}
	}
	}
	// return response()->json(['message'=>'successfully inserted','status'=>1]);
	
$orderDetail = DB::table('orders')
->where('id','=',$order_id)
->first();
$product_mapping=DB::table('order_food')
->leftjoin('food','food.id','order_food.food_id')
->leftjoin('orders','orders.id','order_food.order_id')
->where('order_id','=',$order_id)
->select('order_food.id','order_food.quantity','order_food.price','order_food.total_price','food.name','orders.status')
->get();
// dd($product_mapping);
$product_addon_mapping=DB::table('order_extra_item')
->where('order_id','=',$order_id)
->get();
// dd($product_mapping);
// $full_order_details=array('order_details'=>$orderDetail,'product_mapping'=>$product_mapping,'$product_addon_mapping'=>$product_addon_mapping);
// dd(array('order_details'=>$orderDetail,'product_mapping'=>$product_mapping,'$product_addon_mapping'=>$product_addon_mapping));
	$pdf = PDF::loadView('frontend.mail.attachment.order_invoice_mail',compact('orderDetail','product_mapping','product_addon_mapping'));
	// exit();
	$user=$requested_data['customer_name'];
	$user_email=$requested_data['email'];
	Mail::send('frontend.mail.attachment.order_topic', ['user' => $user,'title' => 'Order request.'], function ($m) use ($user,$pdf,$user_email) {
	
	$m->to($user_email, 'Fooddoose Order request')->subject('we have successfully received your order request');
	// $m->attach($pdf->output());
	$m->attachData($pdf->output(), 'fooddoose_invoice.pdf');
	$m->from('info@fooddoose.com', 'Fooddoose LTD');
	
	});
	
	return response('Order successfully placed');
	
	}
	}