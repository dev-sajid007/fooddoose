<?php
namespace App\Http\Controllers\Backend\Admin\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use DB;
use Validator;
use Response;
use Exception;
class Employee extends Controller
{
public function show_employee (){
return view('admin.extends.employees.employee.manage_employee');
}
public function get_all_employees(){
$query = DB::table('employees')
->select('id','name','designation','email','mobile','join_date','dob','address','status')
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
$button .= '<button name="delete" id="'.$data->id .'" class="delete btn btn-danger btn-sm confirmDelete" record="Area" recordid="{{$data->AreaID}}"><i class="bi bi-trash"></i></button>';
return $button;
})
->rawColumns(['action'])
->toJson();
}
public function delete_employee_api($id){
$select_employee_info=DB::table('employees')->where('id','=',$id)->first();

DB::table('employees')
->where('id','=',$id)
->delete();
return 'successfully deleted';
}
public function single_employee_table_information($id){
$data=DB::table('employees')->where('id','=',$id)->first();
return response()->json($data);
}
public function store_employee(Request $request){
    $this->validate($request, [
'name' => 'required',
'email' => 'required',
'mobile' => 'required',
'join_date' => 'required',
'dob' => 'required',
'status' => 'required',
'address' => 'required',
'experience' => 'required',
// 'employee_image' => 'required',
]);

$image = $request->file('photo');
if ($image) {
$name = time() . '.' . $image->getClientOriginalExtension();
$destinationPath = 'frontend_upload_asset/upload_assets/employeephoto/';
$image->move($destinationPath, $name);
$imageUrl = $destinationPath.$name;

$data = array('name' => $request->name,
'email' =>$request->email,
'mobile' =>$request->mobile,
'dob' =>$request->dob,
'address' =>$request->address,
'status' =>$request->status,
'photo' =>$name,
'join_date' =>$request->join_date,
'experience' =>$request->experience,
'created_at' => date('Y-m-d H:i:s'),
);
DB::table('employees')->insert($data);
return back()->with('message', 'Employee Successfully Added');
}
}

public function update_employee(Request $request){

$employee=DB::table('employees')->where('id',$request->employee_id)->first();


$data = array('name' => $request->name,
'email' =>$request->email,
'mobile' =>$request->mobile,
'dob' =>$request->dob,
'address' =>$request->address,
// 'photo' =>$employee_image,
'join_date' =>$request->join_date,
'status' =>$request->status,
'experience' =>$request->experience,
'updated_at' => date('Y-m-d H:i:s'),
);
DB::table('employees')
->where('id',$request->employee_id )
->update($data);
return response()->json($data);

}
}