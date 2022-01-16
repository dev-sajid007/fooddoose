<?php
namespace App\Http\Controllers\Backend\Admin\Notice;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use DB;
use Validator;
use Response;
use Exception;
class notice extends Controller
{
public function show_notice(){
return view('admin.extends.notices.manage_notice');
}
public function show_inactive_notice(){
return view('admin.extends.notices.inactive_notice');
}
public function show_today_notice(){
return view('admin.extends.notices.today_notice');
}
public function get_all_notices(){
$query = DB::table('notices')
->select('id','heading','sub_heading','title','details','status','notice_date','updated_at');
return DataTables::of($query)
->editColumn('status', function ($inquiry) {
if ($inquiry->status == 1) return 'Active';
if ($inquiry->status == 2) return 'Inactive';
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

public function get_all_inactive_notices(){
$query = DB::table('notices')
->where('status',2)
->select('id','heading','sub_heading','title','details','status','notice_date','updated_at')
;
return DataTables::of($query)
->editColumn('status', function ($inquiry) {
if ($inquiry->status == 1) return 'Active';
if ($inquiry->status == 2) return 'Inactive';
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

public function get_all_today_notices(){
$query = DB::table('notices')
->where('notice_date',date('Y-m-d'))
->select('id','heading','sub_heading','title','details','status','notice_date','updated_at')
;
return DataTables::of($query)
->editColumn('status', function ($inquiry) {
if ($inquiry->status == 1) return 'Active';
if ($inquiry->status == 2) return 'Inactive';
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

public function delete_notice_api($id){
$select_notice_info=DB::table('notices')->where('id','=',$id)->first();

DB::table('notices')
->where('id','=',$id)
->delete();
return 'successfully deleted';
}
public function single_notice_table_information($id){
$data=DB::table('notices')->where('id','=',$id)->first();
return response()->json($data);
}
public function store_notice(Request $request){
    $this->validate($request, [
'heading' => 'required',
'sub_heading' => 'required',
'title' => 'required',
'details' => 'required',
'notice_date' => 'required',
// 'notice_image' => 'required',
]);

$data = array('heading' => $request->heading,
'sub_heading' =>$request->sub_heading,
'title' =>$request->title,
'status' =>$request->status,
'notice_date' =>$request->details,
'notice_date' => $request->notice_date,
'created_at' => date('Y-m-d H:i:s'),
);
DB::table('notices')->insert($data);
return response()->json($data);
}
public function update_notice(Request $request){
// return(dd($request->all()));
$select_team_image=DB::table('notices')->where('id',$request->notice_id)->first();

$data = array('heading' => $request->heading,
'sub_heading' =>$request->sub_heading,
'title' =>$request->title,
'status' =>$request->status,
'details' =>$request->details,
'notice_date' =>$request->notice_date,
'updated_at' => date('Y-m-d H:i:s'),
);
DB::table('notices')
->where('id',$request->notice_id )
->update($data);
session()->flash('success','Update successfully');
return response()->json($data);
}
}