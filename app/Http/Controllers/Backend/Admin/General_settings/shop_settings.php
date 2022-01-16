<?php
namespace App\Http\Controllers\Backend\Admin\General_settings;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;
class shop_settings extends Controller
{
public function shop_setting ()
{
$shop_setting = DB::table('shop_settings')
->where('ShopID','=',1)
->first();

return view('admin.extends.general_settings.shop_setting.shop_setting',compact('shop_setting'));
}

public function update_shop_setting(Request $request)
{

// dd($request->all());
$shop_setting  = DB::table('shop_settings')
->where('ShopID','=',$request->ShopID)
->first();
$LogoName = $shop_setting->Image;
$faviconName= $shop_setting->favicon;
if(($request->hasFile('logo')) && ($request->hasFile('favicon')))
{
$LogoName="";
$faviconName="";
$LogoName = $request->file('logo')->getClientOriginalName();
$faviconName= $request->file('favicon')->getClientOriginalName();
$LogoPath = './frontend_upload_asset/upload_assets/images/logo/';
$favicon_Path = './frontend_upload_asset/upload_assets/images/favicon/';
if (file_exists($favicon_Path.$shop_setting->favicon) ) {
unlink($favicon_Path.$shop_setting->favicon);
}
if(file_exists($LogoPath.$shop_setting->Image)){
unlink($LogoPath.$shop_setting->Image);
}
$request->file('logo')->move($LogoPath , $LogoName);
$request->file('favicon')->move($favicon_Path , $faviconName);
}
// start logo
elseif(($request->hasFile('logo')) )
{
$LogoName="";
$LogoName = $request->file('logo')->getClientOriginalName();
$LogoPath = './frontend_upload_asset/upload_assets/images/logo/';
if (file_exists($LogoPath.$shop_setting->Image)) {
unlink($LogoPath.$shop_setting->Image);
}
$request->file('logo')->move($LogoPath , $LogoName);
}
// start favicon
elseif( ($request->hasFile('favicon'))) {
$faviconName="";
$faviconName= $request->file('favicon')->getClientOriginalName();
$favicon_Path = './frontend_upload_asset/upload_assets/images/favicon/';
if (file_exists($favicon_Path.$shop_setting->favicon)) {
unlink($favicon_Path.$shop_setting->favicon);
// unlink('./frontend_assets/upload_assets/images/favicon/'.$shop_setting[0]->favicon);
}
$request->file('favicon')->move($favicon_Path , $faviconName);
}
DB::table('shop_settings')->where('ShopID',$request->ShopID)->update([
'ShopName' => $request->ShopName,
'Phone' =>  $request->Phone,
'Phone_2' =>  $request->Phone_2,
'Heading' =>  $request->Heading,
'Address' =>  $request->Address,
'Website' => $request->Website,
'Email' => $request->Email,
'Email_2' => $request->Email_2,
'app_link' => $request->app_link,
'company_details' => $request->company_details,
'favicon' => $faviconName,
'Image' => $LogoName,
'updated_at' => date('Y-m-d H:i:s'),
]);
Alert::success('Store Setting Status', 'Store Setting Successfully Updated');
return redirect('/admin/shop-setting');

}
public function admin_dashboard_setting(){
$admin_dashboard = DB::table('admin_dashboard_setting')
->where('admin_dashboard_id','=',1)
->first();
return view('admin.extends.general_settings.shop_setting.admin_dashboard_setting',compact('admin_dashboard'));
}
public function update_admin_dashboard_setting(Request $request){
// dd($request->all());
$admin_dashboard_setting  = DB::table('admin_dashboard_setting')
->where('admin_dashboard_id','=',1)->first();
$LogoPath = './frontend_upload_asset/upload_assets/images/logo/';
$FaviconPath = './frontend_upload_asset/upload_assets/images/favicon/';
$LogoName = $admin_dashboard_setting->logo;
$favicon_name= $admin_dashboard_setting->favicon;
// start logo
if(($request->hasFile('logo')) )
{
if($LogoName !=null){
if (file_exists($LogoPath.$admin_dashboard_setting->logo)) {
unlink($LogoPath.$admin_dashboard_setting->logo);
}
}
$LogoName = $request->file('logo')->getClientOriginalName();
$request->file('logo')->move($LogoPath , $LogoName);
}

if(($request->hasFile('favicon')) )
{
if($favicon_name !=null){
if (file_exists($FaviconPath.$admin_dashboard_setting->favicon)) {
unlink($FaviconPath.$admin_dashboard_setting->favicon);
}
}
$favicon_name = $request->file('favicon')->getClientOriginalName();
$request->file('favicon')->move($FaviconPath , $favicon_name);
}
DB::table('admin_dashboard_setting')->where('admin_dashboard_id',1)->update([
'title' => $request->title,
'dashboard_name' => $request->dashboard_name,
'short_char_title' =>  $request->short_char_title,
'footer_greeting'=>$request->footer_greeting,
'favicon' => $favicon_name,
'logo' => $LogoName,
'updated_at' => date('Y-m-d H:i:s'),
]);
Alert::success('Store Setting Status', 'Store Setting Successfully Updated');
return redirect('admin/admin-dashboard-setting');
}
}