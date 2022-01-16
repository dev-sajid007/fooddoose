<?php
namespace App\Http\Controllers\Backend\Admin\General_settings;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\Datatables\Datatables;
use DB;
use Validator;
use Response;
use Auth;
class footer_pages extends Controller
{
public function show_footer_pages(){
return view('admin.extends.general_settings.footer_pages.manage_footer_page');
}
public function get_all_footer_pages(){
$query = DB::table('footer_pages')
->select('footer_page_id','title','meta_tags','header','sub_header','position','created_at','updated_at')
;
return DataTables::of($query)
->editColumn('position', function ($inquiry) {
if ($inquiry->position == 1) return 'First Position';
if ($inquiry->position == 2) return 'Second Position';
if ($inquiry->position == 3) return 'Third Position';
if ($inquiry->position == 4) return 'Fourth Position';
return 'Not selected';
})
->addColumn('action', function($data){
$button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->footer_page_id.'" data-original-title="Edit" class="edit btn btn-success btn-sm edit-post"><i class="bi bi-pencil-square"></i></a>';
$button .= '&nbsp;&nbsp;';
$button .= '<button name="delete" id="'.$data->footer_page_id.'" class="delete btn btn-danger btn-sm confirmDelete" record="Area" recordid="{{$data->AreaID}}"><i class="bi bi-trash-fill"></i></button>';
return $button;
})
->rawColumns(['action'])
->toJson();
}
public function delete_footer_page_api($id){
DB::table('footer_pages')
->where('footer_page_id','=',$id)
->delete();
return 'successfully deleted';
}
public function single_footer_page_table_information($id){
$data=DB::table('footer_pages')->where('footer_page_id','=',$id)->first();
return response()->json($data);
}
public function store_footer_page (Request $request){
$this->validate($request, [
'title' => 'required|unique:footer_pages',
'header' => 'required',
'sub_header' => 'required',
'position' => 'required',
]);
$slug = $this->make_slug($request->title);
$data = array('title' => $request->title,
'slug' =>$slug,
'meta_tags' =>$request->meta_tags,
'header' =>$request->header,
'header' =>$request->header,
'sub_header' =>$request->sub_header,
'description' =>$request->description,
'position' =>$request->position,
'created_at' => date('Y-m-d H:i:s'),
'updated_at' => date('Y-m-d H:i:s'),
);
DB::table('footer_pages')->insert($data);
return response()->json($data);
}
public function update_footer_page(Request $request){
// return response(dd($request->all()));
$arrayRequest = [
"title" => $request->title,
"header" => $request->header,
"sub_header" => $request->sub_header
];
$arrayValidate = [
"title" => ["required"],
"header" => ["required"],
"sub_header" => ["required"]
];
$response = Validator::make($arrayRequest, $arrayValidate);
if($response->fails()){
return Response::json([
'response' => false,
'errors' => $response->getMessageBag()->toArray()
], 422);
}
$slug = $this->make_slug($request->title);
$data = array('title' => $request->title,
'slug' =>$slug,
'meta_tags' =>$request->meta_tags,
'header' =>$request->header,
'header' =>$request->header,
'sub_header' =>$request->sub_header,
'description' =>$request->description,
'position' =>$request->position,
'updated_at' => date('Y-m-d H:i:s'),
);
DB::table('footer_pages')
->where('footer_page_id',$request->footer_page_id)
->update($data);
return response()->json($data);
}
private function make_slug($string) {
return preg_replace('/\s+/u', '-', trim($string));
}
}