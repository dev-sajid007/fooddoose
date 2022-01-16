<?php
namespace App\Http\Controllers\Backend\Admin\General_settings;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use DB;
use Validator;
use Response;
class team_member extends Controller
{
public function show_team_member (){
return view('admin.extends.general_settings.team_member.manage_team_member');
}
public function get_all_team_members(){
$query = DB::table('team_member')
->select('team_member_id','name','position','phone','email','facebook','linkdin','twitter','team_member_image','created_at','updated_at')
;
return DataTables::of($query)
->addColumn('action', function($data){
$button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->team_member_id .'" data-original-title="Edit" class="edit btn btn-success btn-sm edit-post"><i class="bi bi-pencil-square"></i></a>';
$button .= '&nbsp;&nbsp;';
$button .= '<button name="delete" id="'.$data->team_member_id .'" class="delete btn btn-danger btn-sm confirmDelete" record="Area" recordid="{{$data->AreaID}}"><i class="bi bi-trash-fill"></i></button>';
return $button;
})
->rawColumns(['action'])
->toJson();
}
public function delete_team_member_api($id){
$select_team_member_info=DB::table('team_member')->where('team_member_id','=',$id)->first();
$path='frontend_upload_asset/general_settings/team_member/';
if(file_exists($path.$select_team_member_info->team_member_image)){
unlink($path.$select_team_member_info->team_member_image);
}
DB::table('team_member')
->where('team_member_id','=',$id)
->delete();
return 'successfully deleted';
}
public function single_team_member_table_information($id){
$data=DB::table('team_member')->where('team_member_id','=',$id)->first();
return response()->json($data);
}
public function store_team_member (Request $request){
    $this->validate($request, [
'name' => 'required',
'position' => 'required',
'phone' => 'required',
'email' => 'required',
// 'team_member_image' => 'required',
]);

$team_member_image='';
$image = $request->file('team_member_image');
$path='frontend_upload_asset/general_settings/team_member/';
if ($image) {
$team_member_image = time() . '.' . $image->getClientOriginalExtension();
$image->move($path, $team_member_image);
}
$data = array('name' => $request->name,
'position' =>$request->position,
'details' =>$request->details,
'phone' =>$request->phone,
'email' =>$request->email,
'facebook' =>$request->facebook,
'linkdin' =>$request->linkdin,
'twitter' =>$request->twitter,
'team_member_image' =>$team_member_image,
'created_at' => date('Y-m-d H:i:s'),
'updated_at' => date('Y-m-d H:i:s'),
);
DB::table('team_member')->insert($data);
return response()->json($data);
}
public function update_team_member(Request $request){
// return(dd($request->all()));
$select_team_image=DB::table('team_member')->where('team_member_id',$request->team_member_input_id)->select('team_member_image')->first();
$team_member_image=$select_team_image->team_member_image;
$image = $request->file('team_member_image');
$path='frontend_upload_asset/general_settings/team_member/';
if ($image) {
if(file_exists($path.$team_member_image)){
unlink($path.$team_member_image);
}
$team_member_image = time() . '.' . $image->getClientOriginalExtension();
$image->move($path, $team_member_image);
}
$data = array('name' => $request->name,
'position' =>$request->position,
'details' =>$request->details,
'phone' =>$request->phone,
'email' =>$request->email,
'facebook' =>$request->facebook,
'linkdin' =>$request->linkdin,
'twitter' =>$request->twitter,
'team_member_image' =>$team_member_image,
'updated_at' => date('Y-m-d H:i:s'),
);
DB::table('team_member')
->where('team_member_id',$request->team_member_input_id )
->update($data);
return response()->json($data);
}
}


