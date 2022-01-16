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

class RiderAuthController extends Controller
{
    public function rider_login_page()
    {

        if (Auth::check()) {
            // echo 'working fine';
            $rider = DB::table('users')->where('id', Auth::user()->id)
                ->first();
            if ($rider->user_type == 'rider' && $rider->status == 1) {
                return redirect('rider/dashboard');
            } else {
                Auth::logout();
                return redirect('/rider')->with('warning', 'Please Log In First');
            }
        }
        Auth::logout();
        return view('login_system.rider_auth.rider_login');
    }

    public function rider_login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|max:255',
            'password' => 'required|min:6',
        ]);
        // dd($request->all());
        $select_rider = DB::table('users')->where('email', '=', $request->email)->first();
        if ($select_rider == null) {
            return redirect('/rider')->with('warning', 'We could not found your email');
        } elseif ($select_rider->status == 1 && $select_rider->user_type == 'rider') {
            $credentials = array(
                'email' => $request->input('email'),
                'password' => $request->input('password'),
            );
            $remember = isset($input['remember']) ? $request->input('remember') : false;
            if (Auth::attempt($credentials, $remember)) {
                return redirect('/rider');
            }else {
                // dd("not authenticate");
                return redirect('/rider')->with('warning', 'Login Failed');
            }
        }
        // exit();
        else {
            // dd("not authenticate");
            return redirect('/rider')->with('warning', 'Please Contact Support');
        }
    }
    public function rider_dashboard()
    {
        // Auth::logout();
        return view('rider.extends.dashboard');
    }
    public function rider_logout()
    {
        Auth::logout();
        return redirect('/rider')->with('warning', 'You have successfully logged out');
    }
}
