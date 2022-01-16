<?php

namespace App\Http\Controllers\Backend\Rider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Hash;
use App\Models\User;

class RiderProfileController extends Controller
{
      
      public function show_profile(){
        $rider = DB::table('users')->where('id', Auth::id())
        ->where('user_type','rider')->first();

 //        $id = Auth::id(); 
 // $rider = User::find($id);

          // $id = Auth::user()->id; 
          // $rider = User::find($id);
 
    return view('rider.profile.view-profile',compact('rider'));

   }

    public function update_profile(Request $request){

         $data = User::find(Auth::user()->id);
       
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->address= $request->address;

        if ($request->file('photo')){
          $file = $request->file('photo');
          @unlink(public_path('frontend_upload_asset/upload_assets/riderphoto/'.$data->photo));
          $filename =date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('frontend_upload_asset/upload_assets/riderphoto'), $filename);
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
                return redirect('/rider')->with('success','Password Changed Successfully');
            }else{
               return back()->with('error','New Password and Confirm Password Does Not Match!');
            }

          }else{

            return redirect()->back()->with('error','Your Current Password Does Not Match!');
          }
      }

}

// $id = Auth::user()->user_type == 'rider';
//     $admin = User::find($id);

 // $id = Auth::user()->id; 
 // $admin = User::find($id);
