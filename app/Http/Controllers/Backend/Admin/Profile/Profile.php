<?php

namespace App\Http\Controllers\Backend\Admin\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\User;
class Profile extends Controller
{
      
      public function show_profile(){
     
  // dd(Auth::id());
        $admin = DB::table('users')->where('id', Auth::id())
        ->where('user_type','admin')->first();

 //        $id = Auth::id(); 
 // $admin = User::find($id);

          // $id = Auth::user()->id; 
          // $admin = User::find($id);
 
    return view('admin.extends.profile.view-profile',compact('admin'));

   }

}

// $id = Auth::user()->user_type == 'admin';
//     $admin = User::find($id);

 // $id = Auth::user()->id; 
 // $admin = User::find($id);
