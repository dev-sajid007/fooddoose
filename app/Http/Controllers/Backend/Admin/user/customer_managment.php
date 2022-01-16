<?php
namespace App\Http\Controllers\Backend\Admin\user;
use App\Http\Controllers\Controller;
use App\Models\Backend\User\CustomerModel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
class customer_managment extends Controller
{

public function show_customers(){
  return view('admin.extends.user.customer_managment.manage_customer');
}
public function get_all_customers(){
$query = CustomerModel::latest();
return DataTables::of($query)->filterColumn('first_name', function($query, $keyword) {
$query->whereRaw("CONCAT(first_name, ' ', last_name,' ',email,' ',phone) like ?", ["%{$keyword}%"]);
})
->addColumn('action', function($data){
    
    
    $button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-original-title="Edit" class="edit btn btn-success btn-sm edit-post"><i class="bi bi-pencil-square"></i></a>';
$button .= '&nbsp;&nbsp;';
$button .= '<button name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm confirmDelete" record="Area" recordid="{{$data->AreaID}}"><i class="bi bi-trash-fill"></i></button>';
$button .= '&nbsp;&nbsp;';
$button.='<a href="' . route('change_customer_password.editor', $data->id) .'">'.'<button class=" btn btn-sm btn-info "  ><i class="bi bi-key-fill"></i></button>'.'</a>';
return $button;



})
->escapeColumns([])
->editColumn('first_name', function ($row) {
return [
'user_first_name' => $row->first_name,'user_last_name' => $row->last_name,'address'=>$row->address
];
})
->rawColumns(['first_name'])
->addColumn('contact_info',function($contact){
return [
'phone'=>$contact->phone,'email'=>$contact->email
];
})
->rawColumns(['action'])
->toJson();
}
public function delete_customer_api($id){
CustomerModel::find($id)->delete();
return 'Customer successfully deleted';
}
public function single_customer_info($id){
  $data=CustomerModel::find($id);
  return response()->json($data);
}
public function update_customer(Request $request){
  // dd($request->all());


$customer_info = array('first_name' => $request->first_name,
'last_name' => $request->last_name,
'email' =>$request->email,
'phone' => $request->phone,
'address' => $request->address,
'updated_at' => Carbon::now(),
);
CustomerModel::where('id', $request->id)->update($customer_info);
return redirect('admin/manage-customers')->with('message', 'Customer Successfully Updated');
}
public function change_customer_password($id){
$select_customer_table=CustomerModel::where('id','=',$id)->select('id','first_name','last_name')->first();
// dd($select_customer_table);
return view('admin.extends.user.customer_managment.change_customer_password',compact('select_customer_table'));
}
public function update_customer_password  (Request $request){
$this->validate($request, [
'password' => ['required','min:6'],
]);
$customer_password_data = array('password' => Hash::make($request->password),
'updated_at' => Carbon::now(),
);
CustomerModel::where('id', $request->id)->update($customer_password_data);

if($request->mail==2){
$select_customer_table=CustomerModel::where('id','=',$request->id)->first();
$user="";
$to_email=$select_customer_table->email;
$data = array('user_password'=>$request->password,'first_name'=>$select_customer_table->first_name,'last_name'=>$select_customer_table->last_name,'email_address'=>$select_customer_table->email);
Mail::send('mail.admin_mail.user.customer.change_customer_password', ['data'=>$data,'title' => 'fooddoose, Change Customer Password.'], function ($m) use ($user,$to_email) {
$m->from('info@fooddoose.com', 'Fooddoose');
$m->to($to_email, 'fooddoose')->subject('[Customer Password reset for fooddoose]- Your request for fooddoose.com Password Reset');
});
}
Alert::success('Customer Status', 'Customer password Successfully Updated');
return redirect('/admin/manage-customers');
}
}
