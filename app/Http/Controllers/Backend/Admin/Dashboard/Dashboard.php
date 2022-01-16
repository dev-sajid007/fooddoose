<?php

namespace App\Http\Controllers\Backend\Admin\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\User;
class Dashboard extends Controller
{
      
      public function dashboard(){
            dd(Auth::user());
          $id = Auth::user()->id; 
          $admin = User::find($id);
 
    return view('admin.extends.dashboard',compact('admin'));

   }

}

// $id = Auth::user()->user_type == 'admin';
//     $admin = User::find($id);

 // $id = Auth::user()->id; 
 // $admin = User::find($id);
