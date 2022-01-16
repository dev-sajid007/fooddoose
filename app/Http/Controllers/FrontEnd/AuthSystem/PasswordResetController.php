<?php
namespace App\Http\Controllers\FrontEnd\AuthSystem;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use DB;
use Auth;
use Hash;
use Mail;
class PasswordResetController extends Controller
{
public function merchant_password_request(Request $request)
{
$this->validate($request, [
'merchant_email' => 'required|email',
]);
// dd($request->all());
$select_requested_merchant = DB::table('users')
->where('email', '=', $request->merchant_email)
->select('id','name','email','phone','address')
->first();
// return ($select_requested_merchant);
$select_requested_merchant_varify_email = DB::table('customer_verify')
->where('email', '=', $request->merchant_email)
->first();
$verify_code = rand(1000, 9999);
if ($select_requested_merchant != null ) {
if ($select_requested_merchant_varify_email != null) {
DB::table('customer_verify')->where('id', $select_requested_merchant_varify_email->id)->update([
'address' => $select_requested_merchant->address,
'verify_code' => $verify_code,
'updated_at' => date('Y-m-d H:i:s')
]);
$to_name = $select_requested_merchant->name;
$to_email = $select_requested_merchant->email;
$data = array('verify_code' => $verify_code);
//  return ('working');
Mail::send('frontend.mail.verify_code', $data, function ($message) use ($to_name, $to_email) {
$message->to($to_email, $to_name)
->subject('Verification Code');
$message->from('info@fooddoose.com', 'Fooddoose LTD.');
});
return response(['status'=>1,'message'=>'Please Check Your Email']);
// return response('data successfully updated');
} else {
// echo 'excellient';
//   DB::table('customer_verify')->where('id', $select_requested_merchant_varify_email->id)->insert([
DB::table('customer_verify')->insert([
'name' => $select_requested_merchant->name,
'phone' => $select_requested_merchant->phone,
'email' => $select_requested_merchant->email,
'verify_code' => $verify_code,
'created_at' => date('Y-m-d H:i:s'),
'updated_at' => date('Y-m-d H:i:s')
]);
$to_name = $select_requested_merchant->name;
$to_email = $select_requested_merchant->email;
$data = array('verify_code' => $verify_code);
//  return ('working');
Mail::send('frontend.mail.verify_code', $data, function ($message) use ($to_name, $to_email) {
$message->to($to_email, $to_name)
->subject('Verification Code');
$message->from('info@fooddoose.com', 'Fooddoose LTD.');
});
// return response('data successfully inserted');
return response(['status'=>1,'message'=>'Please Check Your Email']);
}
}else{
return response(['status'=>0,'message'=>'Email Not Found']);
}
// return response('change reset password');
}
public function merchant_confirm_password_request(Request $request)
{
$this->validate($request, [
'varify_code' => 'required',
'new_password' => 'required',
'confirm_password' => 'required',
'merchant_email' => 'required',
]);
$select_requested_merchant_varify_email = DB::table('customer_verify')->where('email', '=', $request->merchant_email)->first();
if($select_requested_merchant_varify_email==null){
return response(['message'=>'invalid attamp','status'=>0]);
}
$verify_code = rand(1000, 9999);
if ($request->new_password != $request->confirm_password) {
return response('the current password and new password did not match!');
}
if ($select_requested_merchant_varify_email->verify_code == $request->varify_code) {
// echo 'perfect';
DB::table('users')->where('email', $request->merchant_email)->update([
'password' => Hash::make($request->confirm_password),
'updated_at' => date('Y-m-d H:i:s')
]);
DB::table('customer_verify')->where('email', $request->merchant_email)->update([
'verify_code' => $verify_code,
'updated_at' => date('Y-m-d H:i:s')
]);
return response('password successfully changed');
} else {
echo 'invalid code';
}
}
}