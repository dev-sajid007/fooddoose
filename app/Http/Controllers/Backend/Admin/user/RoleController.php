<?php

namespace App\Http\Controllers\Backend\Admin\user;

use Yajra\Datatables\Datatables;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Input;
use RealRashid\SweetAlert\Facades\Alert;
// use Validator;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
// public function __construct()
// {
//     $this->middleware('auth:admin');
// }

    //*** JSON Request
public function datatables()
{
$datas = Role::orderBy('role_id','desc')->get();
//--- Integrating This Collection Into Datatables
return Datatables::of($datas)
->addColumn('section', function(Role $data) {
$details =  str_replace('_',' ',$data->section);
$details =  ucwords($details);
return  '<div>'.$details.'</div>'; 
})
->addColumn('action', function(Role $data) {
return '<div class="action-list"><a href="' . route('admin-role-edit',$data->role_id) . ' " class="btn btn-success btn-sm"> <i class="bi bi-pencil-square "></i></a>&nbsp;<a href="javascript:;" data-href="' . route('admin-role-delete',$data->role_id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete btn btn-danger btn-sm "><i class="bi bi-trash-fill"></i></a></div>';
})
->rawColumns(['section','action'])
->toJson(); //--- Returning Json Data To Client Side
}

    //*** GET Request
public function index()
{
return view('admin.extends.user.role.index');
}

    //*** GET Request
public function create()
{
return view('admin.extends.user.role.create');
}

    //*** POST Request
public function store(Request $request)
{
// dd($request->all());
//--- Validation Section
$rules = [
'photo'      => '',
];
$validator = Validator::make($request->all(), $rules);

if ($validator->fails()) {
return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
}
//--- Validation Section Ends
//--- Logic Section
$data = new Role();
$input = $request->all();
if(!empty($request->section))
{
$input['section'] = implode(" , ",$request->section);
}
else{
$input['section'] = '';
}
$data->fill($input)->save();
//--- Logic Section Ends

//--- Redirect Section
// $msg = 'New Data Added Successfully.<a href="'.route('admin-role-index').'">View Role Lists.</a>';
// return response()->json($msg);

Alert::success('Role Status', 'Role Successfully Added');
return redirect('Admin/role');
//--- Redirect Section Ends
}

    //*** GET Request
public function edit($id)
{
    // dd($id);
$data = Role::findOrFail($id);
return view('admin.extends.user.role.edit',compact('data'));
}

    //*** POST Request
public function update(Request $request, $id)
{
//--- Validation Section
$rules = [
'photo'      => '',
];
$validator = Validator::make($request->all(), $rules);

if ($validator->fails()) {
return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
}
//--- Validation Section Ends
//--- Logic Section
$data = Role::findOrFail($id);
$input = $request->all();
if(!empty($request->section))
{
$input['section'] = implode(" , ",$request->section);
}
else{
$input['section'] = '';
}
$data->update($input);
//--- Logic Section Ends
//--- Redirect Section
// $msg = 'Data Updated Successfully.<a href="'.route('admin-role-index').'">View Role Lists.</a>';
Alert::success('Role Status', 'Role Successfully Updated');
return redirect('Admin/role');
// return response()->json($msg);
//--- Redirect Section Ends
}

//*** GET Request Delete
public function destroy($id)
{
$data = Role::findOrFail($id);
$data->delete();
//--- Redirect Section
$msg = 'Data Deleted Successfully.';
return response()->json($msg);
//--- Redirect Section Ends
}
}
