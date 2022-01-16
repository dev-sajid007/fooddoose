<?php

namespace App\Http\Controllers\Backend\Admin\General_settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class social_link_settings extends Controller
{
public function manage_social_links(){
$select_all_social_link=DB::table('social_setting')->get();
return view('admin.extends.general_settings.social_settings.list_social_links',compact('select_all_social_link'));
}

public function select_social_links($id){
// echo $id;
// exit();
$select_single_social_link=DB::table('social_setting')
->where('id','=',$id)
->first();

return view('admin.extends.general_settings.social_settings.update_social_links',compact('select_single_social_link'));
}

public function update_social_link(Request $request){
// dd($request->all());
$data = array('link'=> $request->link,
'status'=> $request->status
);
DB::table('social_setting')
->where('id', $request->id)
->update($data);
return redirect('admin/manage-social-links')->with('message', 'Social link Updated  Successfully');
}
}
