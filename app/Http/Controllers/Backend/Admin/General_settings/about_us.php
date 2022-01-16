<?php
namespace App\Http\Controllers\Backend\Admin\General_settings;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Alert;
class about_us extends Controller
{
public function show_about_us(){
$select_about_us=DB::table('about_us')->where('about_us_id','=',1)->first();
return view('admin.extends.general_settings.about_us.manage_about_us',compact('select_about_us'));
}
public function update_about_us(Request $request){

 $about_us_table  = DB::table('about_us')
->where('about_us_id','=',1)
->first();


$about_us_image_name= $about_us_table->photo;
if(($request->hasFile('photo')))
{
$about_us_image_path = './frontend_upload_asset/upload_assets/general_settings/about_us/';
if(file_exists($about_us_image_path.$about_us_image_name)){
unlink($about_us_image_path.$about_us_image_name);
}
$about_us_image_name= time().$request->file('photo')->getClientOriginalName();
$request->file('photo')->move($about_us_image_path , $about_us_image_name);
}

   DB::table('about_us')->where('about_us_id', 1)->update([
'header' => $request->header,
'sub_header' => $request->sub_header,
'photo' => $about_us_image_name,
'description' =>  $request->description,
'updated_at' => date('Y-m-d H:i:s'),

]);
    Alert::success('Site About Us Status', 'About Us Successfully Updated');
    return redirect('/admin/about-us');
}

} 