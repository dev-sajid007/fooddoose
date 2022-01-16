<?php

namespace App\Http\Controllers\FrontEnd\AuthSystem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use DB;
use Auth;
use App\Models\Frontend\CustomerModelApi;
use Hash;
use Mail;

class FrontEndUserAuth extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'customer_registration', 'change_reset_password_without_login', 'confirm_reset_password_without_login']]);
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        // if ($token = $this->guard()->attempt($credentials)) {
        if ($token = $this->guard()->attempt($credentials)) {
            return $this->respondWithToken($token);
        }
        return response()->json(['error' => 'email or password invalid'], 401);
    }
    /**
     * Get the authenticated User
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json($this->guard()->user());
    }
    /**
     * Log the user out (Invalidate the token)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        $this->guard()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }
    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken($this->guard()->refresh());
    }
    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->guard()->factory()->getTTL() * 60
        ]);
    }
    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\Guard
     */
    public function guard()
    {
        // return Auth::guard();
        // Auth::guard('api')->user();
        // return Auth::guard('api');
        // return Auth::guard('api');
        return Auth::guard('api');
    }
    public function customer_registration(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'email' => 'required|unique:customers',
            'phone' => 'required:max:50',
            'password' => 'required:min:6',
        ]);
        $data = array(
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'name' => $request->first_name . ' ' . $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        );
        DB::table('customers')->insert($data);
        return response('customer successfully registered');
    }
    public function change_customer_password(Request $request)
    {
        $this->validate($request, [
            'current_password' => 'required',
            'new_password' => 'required',
            'confirmed_password' => 'required'
        ]);
        $data = $request->all();
        if (Hash::check($data['current_password'], Auth::guard('api')->user()->password)) {
            if ($data['new_password'] == $data['confirmed_password']) {
                // $hashPassword = Auth::guard('customer')->user()->password;
                // return $hashPassword;
                CustomerModelApi::where('id', Auth::guard('api')->user()->id)->update(['password' => bcrypt($data['new_password'])]);
                // Auth::guard('api')->logout();
                return response('password successfully changed');
            } else {
                return response('The new password and confirm password is not matched!');
            }
        } else {
            return response('The current password is not matched!');
        }
    }
    public function customer_profile_update(Request $request)
    {
        $this->validate($request, [
            'customer_id' => 'required',
            'first_name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'phone' => 'required',
        ]);
        DB::table('customers')->where('id', $request->customer_id)->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'name' => $request->first_name . ' ' . $request->last_name,
            'phone' => $request->phone,
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        return response('profile successfully updated');
    }
    public function change_reset_password_without_login(Request $request)
{
// dd($request->all());
$select_requested_customer = DB::table('customers')
->where('email', '=', $request->customer_email)
->select('id','first_name','last_name','email','phone','address')
->first();
// return ($select_requested_customer);
$select_requested_customer_varify_email = DB::table('customer_verify')
->where('email', '=', $request->customer_email)
->first();
$verify_code = rand(1000, 9999);
if ($select_requested_customer != null) {
if ($select_requested_customer_varify_email != null) {
DB::table('customer_verify')->where('id', $select_requested_customer_varify_email->id)->update([
'address' => $select_requested_customer->address,
'verify_code' => $verify_code,
'updated_at' => date('Y-m-d H:i:s')
]);
$to_name = $select_requested_customer->first_name.$select_requested_customer->last_name;
$to_email = $select_requested_customer->email;
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
//   DB::table('customer_verify')->where('id', $select_requested_customer_varify_email->id)->insert([
DB::table('customer_verify')->insert([
'name' => $select_requested_customer->first_name.$select_requested_customer->last_name,
'phone' => $select_requested_customer->phone,
'email' => $select_requested_customer->email,
'verify_code' => $verify_code,
'created_at' => date('Y-m-d H:i:s'),
'updated_at' => date('Y-m-d H:i:s')
]);
$to_name = $select_requested_customer->first_name.$select_requested_customer->last_name;
$to_email = $select_requested_customer->email;
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
public function confirm_reset_password_without_login(Request $request)
{
$this->validate($request, [
'varify_code' => 'required',
'new_password' => 'required',
'confirm_password' => 'required',
'customer_email' => 'required',
]);
$select_requested_customer_varify_email = DB::table('customer_verify')->where('email', '=', $request->customer_email)->first();
if($select_requested_customer_varify_email==null){
return response(['message'=>'invalid attamp','status'=>0]);
}
$verify_code = rand(1000, 9999);
if ($request->new_password != $request->confirm_password) {
return response('the current password and new password did not match!');
}
if ($select_requested_customer_varify_email->verify_code == $request->varify_code) {
// echo 'perfect';
DB::table('customers')->where('email', $request->customer_email)->update([
'password' => Hash::make($request->confirm_password),
'updated_at' => date('Y-m-d H:i:s')
]);
DB::table('customer_verify')->where('email', $request->customer_email)->update([
'verify_code' => $verify_code,
'updated_at' => date('Y-m-d H:i:s')
]);
return response('password successfully changed');
} else {
echo 'invalid code';
}
}
}
