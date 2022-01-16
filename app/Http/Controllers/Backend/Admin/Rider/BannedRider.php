<?php
namespace App\Http\Controllers\Backend\Admin\Rider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use DB;
use Validator;
use Response;
use Hash;

class BannedRider extends Controller
{
public function show_banned_reader(){
return view('admin.extends.riders.banned.manage_rider');
}

public function get_banned_riders(){
$query = DB::table('users')->where('user_type','rider')->where('status',3)
->select('id','name','email','phone','address','status','created_at','updated_at')
;
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
public function delete_rider_api($id){
$select_rider_info=DB::table('users')->where('id','=',$id)->first();

DB::table('users')
->where('id','=',$id)
->delete();
return 'successfully deleted';
}
public function single_rider_table_information($id){
$data=DB::table('users')->where('id','=',$id)->first();
return response()->json($data);
}
public function store_rider(Request $request){

$this->validate($request, [
'name' => 'required',
'email' => 'required',
'phone' => 'required',
'address' => 'required',
'status' => 'required',
// 'rider_image' => 'required',
]);

$data = array('name' => $request->name,
'email' =>$request->email,
'phone' =>$request->phone,
'address' =>$request->address,
'user_type' =>'rider',
'status' =>$request->status,
'password' =>Hash::make($request->phone),
'created_at' => date('Y-m-d H:i:s'),
);
DB::table('users')->insert($data);
return response()->json($data);
}
public function update_rider(Request $request){
// return(dd($request->all()));
$select_team_image=DB::table('users')->where('id',$request->id)->first();

$data = array('name' => $request->name,
'email' =>$request->email,
'phone' =>$request->phone,
'address' =>$request->address,
'status' =>$request->status,
'updated_at' => date('Y-m-d H:i:s'),
);
DB::table('users')
->where('id',$request->id )
->update($data);
return response()->json($data);
}
}