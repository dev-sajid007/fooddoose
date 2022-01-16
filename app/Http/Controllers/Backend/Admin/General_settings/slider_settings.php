<?php
namespace App\Http\Controllers\Backend\admin\General_settings;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class slider_settings extends Controller
{
public function Manage_slider(){
$select_all_slider=DB::table('slider')->get();
// echo 'slider';
return view('admin.extends.general_settings.list_slider',compact('select_all_slider'));
}
public function store_slider (Request $request){
	// dd($request->all());
	// exit();
	$image = $request->file('slider_immage');
if ($image) {
$name = time() . '.' . $image->getClientOriginalExtension();
$destinationPath = 'frontend_upload_asset/general_settings/slider/';
$image->move($destinationPath, $name);
$imageUrl = $destinationPath.$name;
$data = array('slider_details' => $request->slider_details,
'slider_link' =>$request->slider_link,
'slider_image' => $name,
);
DB::table('slider')->insert($data);
return redirect('admin/manage-slider')->with('message', 'Slider Successfully Added');
}
}
public function slider_status_change($slider_id){
	
	$select_slider_status=DB::table('slider')->where('slider_id','=',$slider_id)->first();
	$slider_status=$select_slider_status->slider_status;
	// echo $slider_status;
	// exit();
	if($slider_status==1){
		$slider_status=0;
		// echo 'slider status 1 to 0';
		// exit();
	}
	elseif ($slider_status==0) {
		$slider_status=1;
		// echo 'slider status 0 to 1';
		// exit();
	}
	// exit();
$data = array('slider_status'=> $slider_status,
);
DB::table('slider')
->where('slider_id', $slider_id)
->update($data);
return redirect('admin/manage-slider')->with('message', 'Slider Status  Successfully Changed');
}
public function slider_delete($slider_id){
$select_slider=DB::table('slider')->where('slider_id','=',$slider_id)->first();
	$slider_image=$select_slider->slider_image;
	// echo $slider_image;
	$path='frontend_upload_asset/general_settings/slider/';
	if(file_exists($path.$slider_image)){
		unlink($path.$slider_image);
	}
	DB::table('slider')->where('slider_id','=',$slider_id)->delete();
return redirect('admin/manage-slider')->with('message', 'Slider Deleted Successfully');
}
public function select_single_slider($slider_id){
$select_single_slider=DB::table('slider')->where('slider_id','=',$slider_id)->first();
// echo "string";
return view('admin.extends.general_settings.update_slider',compact('select_single_slider'));
}
public function update_slider(Request $request){
$slider_id=$request->slider_id;
$select_slider=DB::table('slider')->where('slider_id','=',$slider_id)->first();
$slider_image_name=$select_slider->slider_image;
$image = $request->file('slider_immage');
$path='frontend_upload_asset/general_settings/slider/';
if ($image) {
if(file_exists($path.$slider_image_name)){
	unlink($path.$slider_image_name);
}
$slider_image_name = time() . '.' . $image->getClientOriginalExtension();
$image->move($path, $slider_image_name);
}
$data = array('slider_details'=> $request->slider_details,
	'slider_link'=> $request->slider_link,
	'slider_image'=> $slider_image_name
);
DB::table('slider')
->where('slider_id', $slider_id)
->update($data);
return redirect('admin/manage-slider')->with('message', 'Slider Undated  Successfully');
}
}