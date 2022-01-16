<?php
namespace App\Http\Controllers\Backend\Admin\Accounts;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use DB;
use Validator;
use Response;

use App\Models\Salary;
use App\Models\Employee;

class Salarey extends Controller
{
public function show_salary(){
return view('admin.extends.accounts.salary.manage_salary');
}
public function get_all_salaries(){

$query = DB::table('salaries')
->leftJoin('employees', 'employees.id', '=', 'salaries.employee_id')
->select('salaries.id','employees.name','salaries.pay_date','salaries.salary_type','salaries.pay_system','salaries.pay_method','salaries.year','salaries.month','salaries.amount',);

return DataTables::of($query)
->addColumn('action', function($data){
$button = '<a href="' . route('edit.salary', $data->id) .'">'.'<button class=" btn btn-info "  ><i class="bi bi-pencil-square"></i></button>'.'</a>';
$button .= '&nbsp;&nbsp;';
$button .= '<button name="delete" id="'.$data->id .'" class="delete btn btn-danger btn-sm confirmDelete" record="Area" recordid="{{$data->AreaID}}"><i class="bi bi-trash-fill"></i></button>';
return $button;
})
->rawColumns(['action'])
->toJson();
}
public function delete_salary_api($id){
$select_salary_info=DB::table('salaries')->where('id','=',$id)->first();

DB::table('salaries')
->where('id','=',$id)
->delete();
return 'successfully deleted';
}
public function single_salary_table_information($id){
$data=DB::table('salaries')->where('id','=',$id)->first();
return response()->json($data);
}

public function store_salary_view(){

	$employees = Employee::orderby('name','ASC')->get();

return view('admin.extends.accounts.salary.store_salary_view',compact('employees'));
}

public function store_salary(Request $request){

$this->validate($request, [
'employee_id' => 'required',
'salary_type' => 'required',
'amount' => 'required',
'pay_date' => 'required',
'pay_method' => 'required',
'year' => 'required',
'month' => 'required',
'note' => 'required',
]);





$salary = Salary::where('employee_id', '=',  $request->input('employee_id'))->where('year', '=',  $request->input('year'))->where('month', '=',  $request->input('month'))->first();
if ($salary === null) {
$salary= new Salary();
$salary->employee_id = $request->employee_id;
$salary->salary_type =$request->salary_type;
$salary->pay_date =$request->pay_date;
$salary->pay_method =$request->pay_method;
$salary->pay_system =$request->pay_system;
$salary->year =$request->year;
$salary->month =$request->month;
$salary->amount =$request->amount;
$salary->note =$request->note;
$salary->created_at = date('Y-m-d H:i:s');
$salary->save();
return back()->with('success','Salary Added Succefully');
}else{
return back()->with('error','Salary already Paid at this month');
}
}
public function edit_salary($id){
$salary= Salary::find($id);
$employees = Employee::orderby('name','ASC')->get();
return view('admin.extends.accounts.salary.edit_salary_view',compact('employees','salary'));
}
public function update_salary(Request $request,$id){
// return(dd($request->all()));
$salary=Salary::find($id);

$this->validate($request, [
'employee_id' => 'required',
'salary_type' => 'required',
'amount' => 'required',
'pay_date' => 'required',
'pay_method' => 'required',
'year' => 'required',
'month' => 'required',
'note' => 'required',
]);

$salary->employee_id = $request->employee_id;
$salary->salary_type =$request->salary_type;
$salary->pay_date =$request->pay_date;
$salary->pay_method =$request->pay_method;
$salary->pay_system =$request->pay_system;
$salary->year =$request->year;
$salary->month =$request->month;
$salary->amount =$request->amount;
$salary->note =$request->note;
$salary->created_at = date('Y-m-d H:i:s');
$salary->save();

return back()->with('success','Salary Updated Succefully');


	}


}