<?php
namespace App\Http\Controllers\Backend\Admin\user;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Hash;
use App\Models\User;
use Carbon\Carbon;
use Auth;
use Validator;
use App\Models\Merchant;
use App\Models\Schedule;
use App\Models\Restaurant;
class UserController extends Controller
{
public function show_user(){
		return view('admin.extends.user.users.manage_user');
	}

	public function merchant_user(){
		return view('admin.extends.user.users.merchant_user');
	}

	public function rider_user(){
		return view('admin.extends.user.users.rider_user');
	}

	public function customer_user(){
		return view('admin.extends.user.users.customer_user');
	}



public function get_all_users(){
$query = DB::table('users')
->whereNotIn('user_type',['admin'])
->orderby('id','ASC')
// ->leftJoin('users', 'users.role_id', '=', 'roles.role_id')
->select('id','name','email','phone','status','user_type','role_id','address','created_at');
return DataTables::of($query)
->editColumn('status', function ($inquiry) {
if ($inquiry->status == 1) return 'Approved';
if ($inquiry->status == 2) return 'Pending';
if ($inquiry->status == 3) return 'Rejected';
return 'No selected';
})
->addColumn('action', function($data){
$button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id .'" data-original-title="Edit" class="edit btn btn-success btn-sm edit-post"><i class="bi bi-pencil-square"></i></a>';
$button .= '&nbsp;&nbsp;';
$button .= '<button name="delete" id="'.$data->id .'" class="delete btn btn-danger btn-sm confirmDelete" record="Area" recordid="{{$data->AreaID}}"><i class="bi bi-trash-fill"></i></button>';
return $button;
})
->rawColumns(['action'])
->toJson();
}

public function get_merchant_all_users(){
$query = DB::table('users')
->where('user_type','merchant')
->orderby('id','ASC')
// ->leftJoin('users', 'users.role_id', '=', 'roles.role_id')
->select('id','name','email','phone','status','user_type','role_id','address','created_at');
return DataTables::of($query)
->editColumn('status', function ($inquiry) {
if ($inquiry->status == 1) return 'Approved';
if ($inquiry->status == 2) return 'Pending';
if ($inquiry->status == 3) return 'Rejected';
return 'No selected';
})
->addColumn('action', function($data){
$button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id .'" data-original-title="Edit" class="edit btn btn-success btn-sm edit-post"><i class="bi bi-pencil-square"></i></a>';
$button .= '&nbsp;&nbsp;';
$button .= '<button name="delete" id="'.$data->id .'" class="delete btn btn-danger btn-sm confirmDelete" record="Area" recordid="{{$data->AreaID}}"><i class="bi bi-trash-fill"></i></button>';
$button .= '&nbsp;&nbsp;';
$button.='<a href="' . route('admin.merchant.change-password-view', $data->id) .'">'.'<button class=" btn btn-info btn-sm "  ><i class="bi bi-file-lock"></i></button>'.'</a>';
return $button;
})
->rawColumns(['action'])
->toJson();
}

public function get_rider_all_users(){
$query = DB::table('users')
->where('user_type','rider')
->orderby('id','ASC')
// ->leftJoin('users', 'users.role_id', '=', 'roles.role_id')
->select('id','name','email','phone','status','user_type','role_id','address','created_at');
return DataTables::of($query)
->editColumn('status', function ($inquiry) {
if ($inquiry->status == 1) return 'Approved';
if ($inquiry->status == 2) return 'Pending';
if ($inquiry->status == 3) return 'Rejected';
return 'No selected';
})
->addColumn('action', function($data){
$button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id .'" data-original-title="Edit" class="edit btn btn-success btn-sm edit-post"><i class="bi bi-pencil-square"></i></a>';
$button .= '&nbsp;&nbsp;';
$button .= '<button name="delete" id="'.$data->id .'" class="delete btn btn-danger btn-sm confirmDelete" record="Area" recordid="{{$data->AreaID}}"><i class="bi bi-trash-fill"></i></button>';
$button .= '&nbsp;&nbsp;';
$button.='<a href="' . route('admin.rider.change-password-view', $data->id) .'">'.'<button class=" btn btn-info btn-sm "  ><i class="bi bi-file-lock"></i></button>'.'</a>';
return $button;
})
->rawColumns(['action'])
->toJson();
}

public function get_customer_all_users(){
$query = DB::table('users')
->where('user_type','customer')
->orderby('id','ASC')
// ->leftJoin('users', 'users.role_id', '=', 'roles.role_id')
->select('id','name','email','phone','status','user_type','role_id','address','created_at');
return DataTables::of($query)
->editColumn('status', function ($inquiry) {
if ($inquiry->status == 1) return 'Approved';
if ($inquiry->status == 2) return 'Pending';
if ($inquiry->status == 3) return 'Rejected';
return 'No selected';
})
->addColumn('action', function($data){
$button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id .'" data-original-title="Edit" class="edit btn btn-success btn-sm edit-post"><i class="bi bi-pencil-square"></i></a>';
$button .= '&nbsp;&nbsp;';
$button .= '<button name="delete" id="'.$data->id .'" class="delete btn btn-danger btn-sm confirmDelete" record="Area" recordid="{{$data->AreaID}}"><i class="bi bi-trash-fill"></i></button>';
return $button;
})
->rawColumns(['action'])
->toJson();
}


public function store_user(Request $request){
 $this->validate($request, [
'name' => 'required',
'email' => 'required|unique:users,email',
'phone' => 'required',
'status' => 'required',
'user_type' => 'required',
'password' => 'required',
// 'notice_image' => 'required',
]);

$data = array('name' => $request->name,
'email' =>$request->email,
'phone' =>$request->phone,
'address' =>$request->address,
'user_type' =>$request->user_type,
'status' =>$request->status,
'role_id' =>$request->role_id,
'password' =>Hash::make($request->password),
'created_at' => date('Y-m-d H:i:s'),
);
DB::table('users')->insert($data);
return response()->json($data);
}

	public function single_user_table_information($id){
	$data=DB::table('users')->where('id','=',$id)->first();
	return response()->json($data);
}

	public function single_merchant_user_table_information($id){
	$data=DB::table('users')->where('id','=',$id)->first();
	return response()->json($data);
}

	public function single_rider_user_table_information($id){
	$data=DB::table('users')->where('id','=',$id)->first();
	return response()->json($data);
}

	public function single_customer_user_table_information($id){
	$data=DB::table('users')->where('id','=',$id)->first();
	return response()->json($data);
}


public function update_user(Request $request){

$user=DB::table('users')->where('id',$request->id)->first();

 $this->validate($request,[
'name' => 'required',
'email' => 'required|unique:users,email,'.$user->id,
'phone' => 'required',
'user_type' => 'required',
'status' => 'required',
// 'notice_image' => 'required',
]);


$data = array('name' => $request->name,
'email' =>$request->email,
'phone' =>$request->phone,
'address' =>$request->address,
'user_type' =>$request->user_type,
'status' =>$request->status,
'role_id' =>$request->role_id,
'updated_at' => date('Y-m-d H:i:s'),
);
    
DB::table('users')
->where('id',$request->id )
->update($data);
return response()->json($data);;
}

public function admin_change_password_merchant_view($id){

	$merchant = User::find($id);
	return view('admin.extends.user.users.merchant-change-password',compact('merchant'));

}

public function admin_change_password_merchant(Request $request,$id){

	$user = User::find($id);
	$user->password = Hash::make($request->password);
	$user->save();
	return redirect()->back()->with('success','Password Changed Successfully');

}

public function admin_change_password_rider_view($id){
	$rider = User::find($id);
	return view('admin.extends.user.users.rider-change-password',compact('rider'));

}

public function admin_change_password_rider(Request $request, $id){

	$user = User::find($id);
	$user->password = Hash::make($request->password);
	$user->save();
	return redirect()->back()->with('success','Password Changed Successfully');

}
}