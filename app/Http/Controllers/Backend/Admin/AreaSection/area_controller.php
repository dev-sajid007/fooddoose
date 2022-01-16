<?php
namespace App\Http\Controllers\Backend\Admin\AreaSection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\Datatables\Datatables;
use DB;
use Auth;
class area_controller extends Controller
{
public function show_area (){
$select_district=DB::table('district')->get();
return view('admin.extends.area.manage_area',compact('select_district'));
}
public function get_all_area(){
$query = DB::table('area')
 ->leftJoin('district', 'district.district_id', '=', 'area.district_id')
;
return DataTables::of($query)
->addColumn('action', function($data){
$button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->area_id.'" data-original-title="Edit" class="edit btn btn-success btn-sm edit-post"><i class="bi bi-pencil-square"></i></a>';
$button .= '&nbsp;&nbsp;';
$button .= '<button name="delete" id="'.$data->area_id.'" class="delete btn btn-danger confirmDelete" record="Area" recordid="{{$data->AreaID}}"><i class="bi bi-trash"></i></button>';
return $button;
})
->rawColumns(['action'])
->toJson();
}
public function store_area(Request $request){
// dd($request->all());
$area_banner_image = $request->file('area_banner_photo');
$area_input_image = $request->file('area_photo');
$area_image_photo_path = './frontend_upload_asset/area/image/';
$area_banner_photo_path = './frontend_upload_asset/area/banner/';
$area_banner_photo_name='area_banner_photo.jpg';
$area_photo_name='';
if ($area_banner_image) {
$area_banner_photo_name = time() .$area_banner_image->getClientOriginalName();
$area_banner_image->move($area_banner_photo_path, $area_banner_photo_name);
}
if($area_input_image){
$area_photo_name=time().$area_input_image->getClientOriginalName();
$area_input_image->move($area_image_photo_path,$area_photo_name);
}
// exit();
$data = array('area_name' => $request->area_name,
'area_description' =>$request->area_description,
'district_id' =>$request->district_id,
'area_banner_photo' => $area_banner_photo_name,
'area_photo' => $area_photo_name,
);
DB::table('area')->insert($data);
return redirect('admin/area')->with('message', 'area Successfully Added');
}
public function delete_area_api($id){
$select_area=DB::table('area')->where('area_id','=',$id)->first();
$area_banner_photo = './frontend_upload_asset/area/banner/';
$area_photo = './frontend_upload_asset/area/image/';

if($select_area->area_banner_photo !=null){
if (file_exists($area_banner_photo.$select_area->area_banner_photo)) {
unlink($area_banner_photo.$select_area->area_banner_photo);
}
}
if($select_area->area_photo !=null){
if (file_exists($area_photo.$select_area->area_photo)) {
unlink($area_photo.$select_area->area_photo);

}
}
// return $id;
DB::table('area')
->where('area_id','=',$id)
->delete();
return 'area successfully deleted';
}
public function single_area_info($id){
$data=DB::table('area')->where('area_id','=',$id)->first();
return response()->json($data);
}
public function update_area(Request $request){
// dd($request->all()); 
$select_area=DB::table('area')->where('area_id','=',$request->area_id)->first();
$area_photo_name=$select_area->area_photo;
$area_banner_photo_name=$select_area->area_banner_photo;
$area_input_image = $request->file('area_photo');
$area_banner_photo_image = $request->file('area_banner_photo');
$district_banner_destination = './frontend_upload_asset/area/banner/';
$district_photo_destination = './frontend_upload_asset/area/image/';
if ($area_input_image) {

if($select_area->area_photo !=null){

if (file_exists($district_photo_destination.$select_area->area_photo)) {
unlink($district_photo_destination.$select_area->area_photo);

}
}
$area_photo_name = time().$area_input_image->getClientOriginalName();
$area_input_image->move($district_photo_destination, $area_photo_name);
}
if ($area_banner_photo_image) {
if($select_area->area_banner_photo !=null){

if (file_exists($district_banner_destination.$select_area->area_banner_photo)) {
unlink($district_banner_destination.$select_area->area_banner_photo);

}
}
$area_banner_photo_name = time().$area_banner_photo_image->getClientOriginalName();
$area_banner_photo_image->move($district_banner_destination, $area_banner_photo_name);
}


// echo $area_photo_name ;
// exit();
$district = array('area_name' => $request->area_name,
'area_description' =>$request->area_description,
'district_id' =>$request->district_id,
'area_photo' => $area_photo_name,
'area_banner_photo' => $area_banner_photo_name,
);
DB::table('area')
->where('area_id', $request->area_id)
->update($district);
return redirect('admin/area')->with('message', 'area Successfully updated');
}
}