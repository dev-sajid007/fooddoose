<?php
namespace App\Http\Controllers\Backend\Admin\Accounts;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use DB;
use Validator;
use Response;
use Exception;
class Income extends Controller
{
public function show_income (){
return view('admin.extends.accounts.income.manage_income');
}
public function get_all_incomes(){
$query = DB::table('income')
->select('income_id','way','vendor','amount','income_date','created_at','updated_at')
;
return DataTables::of($query)
->addColumn('action', function($data){
$button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->income_id .'" data-original-title="Edit" class="edit btn btn-success btn-sm edit-post"><i class="bi bi-pencil-square"></i></a>';
$button .= '&nbsp;&nbsp;';
$button .= '<button name="delete" id="'.$data->income_id .'" class="delete btn btn-danger btn-sm confirmDelete" record="Area" recordid="{{$data->AreaID}}"><i class="bi bi-trash-fill"></i></button>';
return $button;
})
->rawColumns(['action'])
->toJson();
}
public function delete_income_api($id){
$select_income_info=DB::table('income')->where('income_id','=',$id)->first();

DB::table('income')
->where('income_id','=',$id)
->delete();
return 'successfully deleted';
}
public function single_income_table_information($id){
$data=DB::table('income')->where('income_id','=',$id)->first();
return response()->json($data);
}

public function store_income(Request $request){
    $this->validate($request, [
'way' => 'required',
'vendor' => 'required',
'amount' => 'required',
'income_date' => 'required',
'description' => 'required',
// 'income_image' => 'required',
]);

$data = array('way' => $request->way,
'vendor' =>$request->vendor,
'amount' =>$request->amount,
'income_date' =>$request->income_date,
'description' =>$request->description,
'created_at' => date('Y-m-d H:i:s'),
);
DB::table('income')->insert($data);
return response()->json($data);
}
public function update_income(Request $request){
// return(dd($request->all()));
$select_team_image=DB::table('income')->where('income_id',$request->income_id)->first();

$data = array('way' => $request->way,
'vendor' =>$request->vendor,
'amount' =>$request->amount,
'income_date' =>$request->income_date,
'description' =>$request->description,
'updated_at' => date('Y-m-d H:i:s'),
);
DB::table('income')
->where('income_id',$request->income_id )
->update($data);
session()->flash('success','Update successfully');
return response()->json($data);
}
}