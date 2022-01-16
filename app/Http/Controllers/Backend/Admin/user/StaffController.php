<?php
namespace App\Http\Controllers\Backend\Admin\user;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;
use Hash;
class StaffController extends Controller
{
	public function show_staff(){
$select_role=DB::table('roles')
->select('role_id','name')
->get();
// dd($select_role);
return view('admin.extends.user.staff_managment.manage_staff',compact('select_role'));
}
public function get_all_staff(){
	$query = DB::table('users')
	->leftjoin('roles','roles.role_id','=','users.role_id')
	->select('users.id','users.name as account_name','users.email','users.address','users.created_at','users.updated_at','roles.name as role_name');
return DataTables::of($query)
->addColumn('action', function($data){
$button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-original-title="Edit" class="edit btn btn-success btn-sm edit-post"><i class="bi bi-pencil-square"></i></a>';
$button .= '&nbsp;&nbsp;';
$button .= '<button name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm confirmDelete" record="Area" recordid="{{$data->AreaID}}"><i class="bi bi-trash-fill"></i></button>';
$button .= '&nbsp;&nbsp;';
$button.='<a href="' . route('change_staff.password', $data->id) .'">'.'<button class=" btn btn-sm btn-info "  ><i class="bi bi-key-fill"></i></button>'.'</a>';
return $button;
})
->rawColumns(['action'])
->toJson();
}
public function delete_staff_api($id){
	
DB::table('users')
->where('id','=',$id)
->delete();
return 'Staff successfully deleted';
}
public function single_staff_info($id){
	$data=DB::table('users')
	->leftjoin('roles','roles.role_id','=','users.role_id')
	->where('users.id','=',$id)
	->select('users.id','users.name','users.email','users.address','users.role_id')
	->first();
	return response()->json($data);
}
public function store_staff (Request $request){
	// dd($request->all()); 
	// return redirect('/admin/staff')->with('warning','Your account have some issue. Please contact support');
	// return redirect()->back()->with('warning','User Already registered. please contact developer'); 
	$select_user=DB::table('users')->where('email','=',$request->email)->first();
	if($select_user !=null){
		return redirect()->back()->with('warning','User Already registered. please contact developer');
	}
	
$staff_info = array('name' => $request->name,
'email' =>$request->email,
'password'=>Hash::make($request->password),
'user_type'=>'admin',
'status' =>$request->status,
'address'=>$request->address,
'role_id' => $request->role_id,
'updated_at' => Carbon::now(),
);
DB::table('users')
->insert($staff_info);
Alert::success('Staff Status', 'Staff Successfully Added');
return redirect('admin/staff');
}
public function update_staff (Request $request){
	// dd($request->all());
	
$staff_info = array('name' => $request->name,
'email' =>$request->email,
'status' =>$request->status,
'address'=>$request->address,
'role_id' => $request->role_id,
'updated_at' => Carbon::now(),
);
DB::table('users')
->where('id', $request->id)
->update($staff_info);
Alert::success('Staff Status', 'Staff Successfully updated');
return redirect('admin/staff');
}
public function change_staff_password($id){
	// return $id;
$select_customer_table=DB::table('users')
->where('id','=',$id)
->select('id','name')
->first();
return view('admin.extends.user.staff_managment.change_staff_password',compact('select_customer_table'));
}
public function update_staff_password  (Request $request){
$this->validate($request, [
'password' => ['required','min:6'],
]);
// dd($request->all());
$data = array('password' => Hash::make($request->password),
"updated_at" => date('Y-m-d H:i:s')
);
DB::table('users')
->where('id',  $request->id)
->update($data);
Alert::success('Customer Status', 'Customer password Successfully Updated');
return redirect('/admin/staff');
}
}