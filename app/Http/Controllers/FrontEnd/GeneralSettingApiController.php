<?php
namespace App\Http\Controllers\FrontEnd;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use DB;
class GeneralSettingApiController extends Controller
{

public function shop_setting(){
$data=DB::table('shop_settings')
->where('ShopID','=',1)
->select('ShopName','Image','Email','Email_2','Phone','Phone_2','Address','Website','company_details')
->first();
return response()->json($data);
}

public function Slider(){
$data=DB::table('slider')
->latest()
->limit(10)
->where('slider_status','=',1)
->select('slider_details','slider_image')
->get();
return response()->json($data);
}
public function social_links(){
$data=DB::table('social_setting')
->where('status','=',1)
->select('name','link','icon')
->get();
return response()->json($data);
}
public function about_us(){
$data=DB::table('about_us')
->where('about_us_id','=',1)
->select('header','sub_header','description','photo')
->get();
return response()->json($data);
}
public function footer_pages(){
$data=DB::table('footer_pages')
->select('title','slug','position')
->select('title','slug','position')
->select('title','slug')

->select('title','slug','position')
->get();
return response()->json($data);
}
public function footer_page($slug){
$select_footer_page=DB::table('footer_pages')
->where('slug','=',$slug)
->select('footer_page_id')
->first();

if($select_footer_page ==null){
return response()->json('footer page not found', 500);
}
else{
$data=DB::table('footer_pages')
->where('slug','=',$select_footer_page->footer_page_id )
->select('title','meta_tags','header','sub_header','description','')
->first();
	return response()->json($data);
}

if($select_footer_page ==null){
// return response()->json('footer page not found', 500);
	return response()->json(['message'=>'could not find footer page']);
}
else{
$data=DB::table('footer_pages')
->where('footer_page_id','=',$select_footer_page->footer_page_id )
->select('title','meta_tags','header','sub_header','description')
->first();
	return response()->json($data);
}
} 
public function team_members(){
$data=DB::table('team_member')
->select('name','details','position','phone','email','facebook','linkdin','twitter','team_member_image')
->get();
return response()->json($data);

}
}