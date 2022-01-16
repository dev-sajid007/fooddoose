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
use Validator;
use App\Models\Merchant;
use App\Models\Schedule;
use App\Models\Restaurant;
class RestaurantController extends Controller
{
public function create(){
		return view('admin.extends.user.restaurant.create_restaurant');
	}

public function edit($id){
	// return $id; 
$user = User::find($id);
return view('admin.extends.user.restaurant.edit-restaurant',compact('user'));
}
	

// 	public function update(Request $request, $id){
// 		$user = User::find($id);
// 		$restaurant = Restaurant::where('user_id',$user->id)->first();
// 		$restaurant->restaurant_name = $request->restaurant_name;
// 		$restaurant->restaurant_code = $request->restaurant_code;
// 		$restaurant->address = $request->address;
// 		$restaurant->status = $request->status;
// 		$restaurant->tin = $request->tin;
// 		$restaurant->since = $request->since;
// 		$restaurant->save();

// 		return back()->with('success','Restaurant successfully Updated');
// }

	public function single_restaurant_info($id){
	$data=DB::table('restaurant')->where('restaurant_id','=',$id)->first();
	return response()->json($data);
}

public function get_all_restaurant(){
$query = DB::table('restaurant')
->leftJoin('users', 'users.id', '=', 'restaurant.user_id')
->select('restaurant.restaurant_id','users.name','users.phone','restaurant.status','restaurant.restaurant_name','restaurant.restaurant_code','restaurant.address','restaurant.created_at');
return DataTables::of($query)
->editColumn('status', function ($inquiry) {
if ($inquiry->status == 1) return 'Approved';
if ($inquiry->status == 2) return 'Pending';
if ($inquiry->status == 3) return 'Rejected';
return 'No selected';
})
->addColumn('action', function($data){
$button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->restaurant_id .'" data-original-title="Edit" class="edit btn btn-success btn-sm edit-post"><i class="bi bi-pencil-square"></i></a>';
$button .= '&nbsp;&nbsp;';
// $button .= '<button name="delete" id="'.$data->restaurant_id .'" class="delete btn btn-danger confirmDelete" record="Area" recordid="{{$data->AreaID}}"><i class="bi bi-trash-fill"></i></button>';
return $button;
})
->rawColumns(['action'])
->toJson();
}
public function all_restaurant(){

return view('admin.extends.user.restaurant.manage_restaurant');
}

public function pending_restaurant(){

return view('admin.extends.user.restaurant.inactive_restaurant');
}



public function rejected_restaurant(){
return view('admin.extends.user.restaurant.rejected_restaurant');
}
public function get_all_pending_restaurant(){
$query = DB::table('restaurant')

->leftJoin('users', 'users.id', '=', 'restaurant.user_id')
->where('restaurant.status',2)
->select('restaurant.restaurant_id','users.name','users.phone','restaurant.status','restaurant.restaurant_name','restaurant.restaurant_code','restaurant.address','restaurant.created_at');
return DataTables::of($query)
->editColumn('status', function ($inquiry) {
if ($inquiry->status == 1) return 'Approved';
if ($inquiry->status == 2) return 'Pending';
if ($inquiry->status == 3) return 'Rejected';
return 'No selected';
})
->addColumn('action', function($data){
$button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->restaurant_id .'" data-original-title="Edit" class="edit btn btn-success btn-sm edit-post"><i class="bi bi-pencil-square"></i></a>';
$button .= '&nbsp;&nbsp;';
// $button .= '<button name="delete" id="'.$data->restaurant_id .'" class="delete btn btn-danger confirmDelete" record="Area" recordid="{{$data->AreaID}}"><i class="bi bi-trash-fill"></i></button>';
return $button;
})
->rawColumns(['action'])
->toJson();
}
public function get_all_rejected_restaurant(){
$query = DB::table('users')
->where('user_type','merchant')
->where('status',3)
->leftJoin('restaurant', 'restaurant.user_id', '=', 'users.id')
->select('users.id','users.name','users.email','users.phone','users.status','users.created_at','users.updated_at','restaurant.restaurant_name','restaurant.restaurant_code','restaurant.address','restaurant.tin','restaurant.since','restaurant.status');
return DataTables::of($query)
->addColumn('action', function($data){
$button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id .'" data-original-title="Edit" class="edit btn btn-success btn-sm edit-post"><i class="bi bi-pencil-square"></i></a>';
$button .= '&nbsp;&nbsp;';
$button .= '<button name="delete" id="'.$data->id .'" class="delete btn btn-danger confirmDelete" record="Area" recordid="{{$data->AreaID}}"><i class="bi bi-trash-fill"></i></button>';
return $button;
})
->rawColumns(['action'])
->toJson();
}


public function update_restaurant(Request $request){
// return(dd($request->all()));
$select_team_image=DB::table('restaurant')->where('restaurant_id',$request->restaurant_id)->first();

$data = array('restaurant_name' => $request->restaurant_name,
'restaurant_code' =>$request->restaurant_code,
'address' =>$request->address,
'tin' =>$request->tin,
'since' =>$request->since,
'status' =>$request->status,
'updated_at' => date('Y-m-d H:i:s'),
);
DB::table('restaurant')
->where('restaurant_id',$request->restaurant_id )
->update($data);
session()->flash('success','Update successfully');
return response()->json($data);
}
}