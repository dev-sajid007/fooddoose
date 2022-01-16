<?php
namespace App\Http\Controllers\Backend\Admin\AreaSection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\Datatables\Datatables;
use DB;
use Auth;
class disctrict_controller extends Controller
{
public function select_all_area_district($id){
// return response('working oke');
echo json_encode(DB::table('area')->where('district_id','=', $id)->get());
}
public function show_district(){
	return view('admin.extends.district.manage_district');
}
public function get_all_district(){
	$query = DB::table('district');
return DataTables::of($query)
->addColumn('action', function($data){
$button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->district_id.'" data-original-title="Edit" class="edit btn btn-success btn-sm edit-post"><i class="bi bi-pencil-square"></i></a>';
$button .= '&nbsp;&nbsp;';
$button .= '<button name="delete" id="'.$data->district_id.'" class="delete btn btn-danger confirmDelete" record="Area" recordid="{{$data->AreaID}}"><i class="bi bi-trash"></i></button>';
return $button;
})
->rawColumns(['action'])
->toJson();
}
public function store_district(Request $request){
$district_banner_photo_name='district_banner_photo.jpg';
$district_photo_name='';
// dd($request->all());
$district_banner_image = $request->file('district_banner_photo');
$district_input_image = $request->file('district_photo');
$district_image_photo_path = './frontend_upload_asset/district/image/';
$district_banner_photo_path = './frontend_upload_asset/district/banner/';
if ($district_banner_image) {
// echo "district banner";
// exit();
$district_banner_photo_name = time() .$district_banner_image->getClientOriginalName();
$district_banner_image->move($district_banner_photo_path, $district_banner_photo_name);
}
if($district_input_image){
$district_photo_name=time().$district_input_image->getClientOriginalName();
$district_input_image->move($district_image_photo_path,$district_photo_name);
}
// exit();
$data = array('district_name' => $request->district_name,
'district_details' =>$request->district_details,
'district_banner_photo' => $district_banner_photo_name,
'district_photo' => $district_photo_name,
);
DB::table('district')->insert($data);
return redirect('admin/district')->with('message', 'district Successfully Added');
}
public function delete_district_api($id){
$select_district=DB::table('district')->where('district_id','=',$id)->first();
$district_banner_photo = './frontend_upload_asset/district/banner/';
$district_photo = './frontend_upload_asset/district/image/';
if($select_district->district_banner_photo !=null){

if (file_exists($district_banner_photo.$select_district->district_banner_photo)) {
unlink($district_banner_photo.$select_district->district_banner_photo);
}
}
if($select_district->district_photo !=null){

if (file_exists($district_photo.$select_district->district_photo)) {
unlink($district_photo.$select_district->district_photo);
}
}
// return $id;
DB::table('district')
->where('district_id','=',$id)
->delete();
return 'District successfully deleted';
}
public function single_district_info($id){
$data=DB::table('district')->where('district_id','=',$id)->first();
return response()->json($data);
}
public function update_district(Request $request){
// dd($request->all());
$select_district=DB::table('district')->where('district_id','=',$request->district_id)->first();
$district_photo_name=$select_district->district_photo;
$district_banner_photo_name=$select_district->district_banner_photo;
$district_image_input = $request->file('district_photo');
$district_banner_photo_input = $request->file('district_banner_photo');
$district_banner_destination = './frontend_upload_asset/district/banner/';
$district_photo_destination = './frontend_upload_asset/district/image/';
if ($district_image_input) {
if($select_district->district_photo !=null){
if (file_exists($district_photo_destination.$select_district->district_photo)) {
unlink($district_photo_destination.$select_district->district_photo);
}
}
$district_photo_name = time().$district_image_input->getClientOriginalName();
$district_image_input->move($district_photo_destination, $district_photo_name);
}
if ($district_banner_photo_input) {
	if($select_district->district_banner_photo !=null){
if (file_exists($district_banner_destination.$select_district->district_banner_photo)) {
unlink($district_banner_destination.$select_district->district_banner_photo);
}
}
$district_banner_photo_name = time().$district_banner_photo_input->getClientOriginalName();
$district_banner_photo_input->move($district_banner_destination, $district_banner_photo_name);
}
$district = array('district_name' => $request->district_name,
'district_details' =>$request->district_details,
'district_photo' => $district_photo_name,
'district_banner_photo' => $district_banner_photo_name,
);
DB::table('district')
->where('district_id', $request->district_id)
->update($district);
return redirect('admin/district')->with('message', 'district Successfully Added');
}
}