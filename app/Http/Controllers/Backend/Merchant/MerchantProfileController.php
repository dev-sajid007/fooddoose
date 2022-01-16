<?php

namespace App\Http\Controllers\Backend\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Hash;
use App\Models\User;
use App\Models\Merchant;

class MerchantProfileController extends Controller
{
      
      public function show_profile(){
        $merchant = DB::table('users')->where('id', Auth::user()->id)
        ->where('user_type','merchant')->first();
        $info= Merchant::where('user_id',Auth::user()->id)->first();

 //        $id = Auth::id(); 
 // $merchant = User::find($id);

          // $id = Auth::user()->id; 
          // $merchant = User::find($id);

    return view('merchant.profile.view-profile',compact('merchant','info'));

   }

    public function update_profile(Request $request){

         $data = User::find(Auth::user()->id);
       
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->address= $request->address;

        if ($request->file('photo')){
          $file = $request->file('photo');
          @unlink(public_path('frontend_upload_asset/upload_assets/merchantphoto/'.$data->photo));
          $filename =date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('frontend_upload_asset/upload_assets/merchantphoto'), $filename);
          $data['photo'] = $filename;
        }
        $data->save();
      return back()->with('message','Profile Updated Successfully');

        }


        public function change_password(Request $request){

          $id = Auth::user()->id;
          $db_pass = Auth::user()->password;
          $old_pass = $request->old_password;
          $new_pass = $request->new_password;
          $confirm_pass = $request->password_confirmation;

          if(Hash::check($old_pass, $db_pass)){
            if($new_pass === $confirm_pass){

                User::find($id)->update([
                  'password' => Hash::make($request->new_password)
                ]);

                Auth::logout();
                return redirect('/merchant')->with('success','Password Changed Successfully');
            }else{
               return back()->with('error','New Password and Confirm Password Does Not Match!');
            }

          }else{

            return redirect()->back()->with('error','Your Current Password Does Not Match!');
          }
      }
      
      public function update_info(Request $request){

       $merchant = Merchant::where('user_id',Auth::user()->id)->first();
       // $merchant->merchant_id = $request->merchant_id;
       $merchant->business_name = $request->business_name;
       $merchant->bkash_number = $request->bkash_number;
       $merchant->rocket_number = $request->rocket_number;
       $merchant->nagad_number = $request->nagad_number;
       $merchant->bank_name = $request->bank_name;
       $merchant->account_name = $request->account_name;
       $merchant->account_number = $request->account_number;
       $merchant->payment_method = $request->payment_method;
       $merchant->save();

       return back()->with('success','Additional Info Updated Successfully');

    }

}

// $id = Auth::user()->user_type == 'merchant';
//     $admin = User::find($id);

 // $id = Auth::user()->id; 
 // $admin = User::find($id);
