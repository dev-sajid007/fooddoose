<?php

namespace App\Http\Controllers\FrontEnd\AuthSystem;

use App\Http\Controllers\Controller;
use App\Model\CustomerVerifyModel;
use Illuminate\Http\Request;
use Hash;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\DB;
use Auth;
use Mail;
use DB;
use Validator;

class MerchantAuthController extends Controller
{
    public function merchant_login_page()
    {
        if (Auth::check()) {
            // echo 'working fine';
            $merchant = DB::table('users')->where('id', Auth::user()->id)
                ->first();
            if ($merchant->user_type == 'merchant' && $merchant->status == 1) {
                return redirect('merchant/dashboard');
            } else {
                Auth::logout();
                return redirect('/merchant')->with('warning', 'Please Log In First');
            }
        }
        Auth::logout();
        return view('login_system.merchant_auth.merchant_login');
    }
    public function merchant_login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|max:255',
            'password' => 'required|min:6',
        ]);
        // dd($request->all());
        $select_merchant = DB::table('users')->where('email', '=', $request->email)->first();
        if ($select_merchant == null) {
            return redirect('/merchant')->with('warning', 'We could not found your email');
        } elseif ($select_merchant->status == 1 && $select_merchant->user_type == 'merchant') {
            $credentials = array(
                'email' => $request->input('email'),
                'password' => $request->input('password'),
            );
            $remember = isset($input['remember']) ? $request->input('remember') : false;
            if (Auth::attempt($credentials, $remember)) {
                return redirect()->route('merchant./');
            }else {
                // dd("not authenticate");
                return redirect('/login')->with('warning', 'Login Failed');
            }
        }
        // exit();
        else {
            // dd("not authenticate");
            return redirect('/merchant')->with('warning', 'Please Contact Support');
        }
    }
    public function merchant_dashboard()
    {
        // Auth::logout();
        return view('merchant.extends.dashboard');
    }
    public function merchant_logout()
    {
        Auth::logout();
        return redirect('/merchant')->with('warning', 'You have successfully logged out');
    }
}
