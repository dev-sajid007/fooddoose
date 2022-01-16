<?php
namespace App\Http\Controllers\FrontEnd;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use DB; 
use Mail;
use Hash;
class RequestController extends Controller
{
public function store_contact_us(Request $request){
$validator = Validator::make($request->all(), [
'name' => ['required'],
'email' => ['required','email','max:70'],
'phone' => ['required'],
'subject' => ['required','max:100'],
'message' => ['required','max:500'],
]);
if ($validator->fails()):
$response = [
'success' => false,
'message' => $validator->messages()
];
return response()->json($response, 404);
endif;
$contact_us_data =array(
'name' => $request->name,
'email' => $request->email,
'phone' => $request->phone,
'subject'=>$request->subject,
'message'=>$request->message,
'created_at' => date('Y-m-d H:i:s'),
'updated_at' => date('Y-m-d H:i:s'),
);
DB::table('contact_us')->insert($contact_us_data);
return response()->json(['message'=>'Contact Us successfully submitted','status'=>200]);
}
public function store_subscriber(Request $request){
$validator = Validator::make($request->all(), [
'email' => ['required','unique:subscribe_now','max:70','email']
]);
if ($validator->fails()):
$response = [
'success' => false,
'message' => $validator->messages()
];
return response()->json($response, 404);
endif;
// $validatedData = $request->validate([
// 'email' => 'required|max:70|unique:subscribe_now',
// ]);
$subscribe_now_data = array('email' => $request->input('email'),
'created_at' => date('Y-m-d H:i:s'),
'updated_at' => date('Y-m-d H:i:s'),
);
DB::table('subscribe_now')->insert($subscribe_now_data);
return response()->json(['message'=>'Subscribe Us successfully submitted','status'=>200]);
}
public function merchant_registration(Request $request){


$validator = Validator::make($request->all(), [
'merchant_name' => ['required'],
'email' => ['required','email','max:70','unique:users'],
'merchant_phone' => ['required'],
'merchant_address' => ['required','max:100'],
'password' => ['required','max:50'],
'business_name' => ['required','max:100'],
'bkash_number' => ['max:15'],
'rocket_number' => ['max:15'],
'nagad_number' => ['max:15'],
'bank_name' => ['required','max:30'],
'account_name' => ['required','max:100'],
'account_number' => ['required','max:100'],
'payment_method' => ['required','max:100'],
]);

if ($validator->fails()):
$response = [
'success' => false,
'message' => $validator->messages()
];
return response()->json($response, 404);
endif;

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
$latest_id=DB::table('users')->insertGetId([
'name'=>$request->merchant_name,
'email'=>$request->email,
'phone'=>$request->merchant_phone,
'address'=>$request->merchant_address,
'password'=>Hash::make($request->password),
'user_type'=>'merchant',
'status'=>2,//pending status
'created_at' => date('Y-m-d H:i:s'),
'updated_at' => date('Y-m-d H:i:s'),
]);
$merchant_additional_info = array(
'user_id' => $latest_id,
'business_name' =>$request->business_name,
'bkash_number' =>$request->bkash_number,
'rocket_number' =>$request->rocket_number,
'nagad_number' =>$request->nagad_number,
'bank_name' =>$request->bank_name,
'account_name' =>$request->account_name,
'account_number' =>$request->account_number,
'payment_method' =>$request->payment_method,
'created_at' => date('Y-m-d H:i:s'),
'updated_at' => date('Y-m-d H:i:s'),
);

DB::table('merchant')->insert($merchant_additional_info);
return response()->json(['message'=>'merchant successfully stored','status'=>200]);
}

public function rider_registration(Request $request){
$validator = Validator::make($request->all(), [
'name' => ['required'],
'email' => ['required','email','max:70','unique:users'],
'phone' => ['required'],
'address' => ['required','max:100'],
'password' => ['required','max:100'],

]);
if ($validator->fails()):
$response = [
'success' => false,
'message' => $validator->messages()
];
return response()->json($response, 404);
endif;

DB::table('users')->insert([
'name'=>$request->name,
'email'=>$request->email,
'phone'=>$request->phone,
'address'=>$request->address,
'password'=>Hash::make($request->password),
'user_type'=>'rider',
'status'=>2,//pending status
'created_at' => date('Y-m-d H:i:s'),
'updated_at' => date('Y-m-d H:i:s'),
]);

return response()->json(['message'=>'merchant successfully stored','status'=>200]);
}
}