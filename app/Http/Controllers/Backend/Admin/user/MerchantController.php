<?php
namespace App\Http\Controllers\Backend\Admin\user;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Hash;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Merchant;
use App\Models\Restaurant;
use App\Models\Schedule;



class MerchantController extends Controller
{
public function create(){
		return view('admin.extends.user.merchant.create_merchant');
	}


public function edit($id){
	// return $id; 
$user = User::find($id);
// dd($user);
return view('admin.extends.user.merchant.edit-merchant',compact('user'));
}
	public function store(Request $request){

		 $request->validate([
        'merchant_name' => 'required',
        'merchant_email' => 'required|email|unique:users,email',
        'tin' => 'numeric',
    ]);


$merchant_info = array('name' => $request->merchant_name,
'email' =>$request->merchant_email,
'phone' =>$request->merchant_phone,
'address' =>$request->merchant_address,

'status' =>$request->merchant_status,
'password'=>Hash::make($request->merchant_password),
'user_type'=>'merchant',
'created_at' => Carbon::now(),
'updated_at' => Carbon::now(),
);
$latest_id=DB::table('users')
->insertGetId($merchant_info);
// insert data to merchant table
$merchant_additional_info = array(
'user_id' => $latest_id,
'business_name' => $request->business_name,
'bkash_number' =>$request->bkash_number,
'rocket_number' =>$request->rocket_number,
'nagad_number' =>$request->nagad_number,
'bank_name' =>$request->bank_name,
'account_name' =>$request->account_name,
'account_number' =>$request->account_number,
'payment_method' =>$request->payment_method,
'created_at' => Carbon::now(),
'updated_at' => Carbon::now(),
);
$latest_merchant_id=DB::table('merchant')
->insertGetId($merchant_additional_info);
// insert data to restaurant
$restaurant_additional_info = array(
'user_id' => $latest_id,
'merchant_id' => $latest_merchant_id,
'restaurant_name' => $request->restaurant_name,
'restaurant_code' =>$request->restaurant_code,
'address' =>$request->address,
'tin' =>$request->tin,
'since' =>$request->since,
'status' =>$request->status,
'tin' =>$request->tin,
'status' =>$request->status,
'created_at' => Carbon::now(),
'updated_at' => Carbon::now(),
);
$latest_restaurant_id=DB::table('restaurant')
->insertGetId($restaurant_additional_info);
// insert data to schedule
$schedule_info = array(
'user_id' => $latest_id,
'restaurant_id' => $latest_restaurant_id,
'sunday' => $request->sunday,
'monday' =>$request->monday,
'tuesday' =>$request->tuesday,
'wednesday' =>$request->wednesday,
'thursday' =>$request->thursday,
'friday' =>$request->friday,
'saturday' =>$request->saturday,
'shop_open' =>$request->shop_open,
'shop_close' =>$request->shop_close,
'created_at' => Carbon::now(),
'updated_at' => Carbon::now(),
);
DB::table('schedule')
->insert($schedule_info);

return redirect()->back()->with('success','merchant successfully added');
	}



// 	public function update(Request $request, $id){


// 		$user = User::find($id);
// 	$request->validate([
        
//         'email' => 'required|email|unique:users,email,'.$user->id,
//         'tin' => 'numeric',
//     ]);
// 		$user->name= $request->name;
// 		$user->email= $request->email;
// 		$user->phone= $request->phone;
// 		$user->address= $request->address;
// 		$user->status= $request->status;
// 		$user->save();

// 		$merchant = Merchant::where('user_id',$user->id)->first();
// 		$merchant->business_name = $request->business_name;
// 		$merchant->bkash_number = $request->bkash_number;
// 		$merchant->rocket_number = $request->rocket_number;
// 		$merchant->nagad_number = $request->nagad_number;
// 		$merchant->bank_name = $request->bank_name;
// 		$merchant->account_name = $request->account_name;
// 		$merchant->account_number = $request->account_number;
// 		$merchant->payment_method = $request->payment_method;
// 		$merchant->save();

// 		$restaurant = Restaurant::where('user_id',$user->id)->first();
// 		$restaurant->restaurant_name = $request->restaurant_name;
// 		$restaurant->restaurant_code = $request->restaurant_code;
// 		$restaurant->address = $request->address;
// 		$restaurant->status = $request->status;
// 		$restaurant->tin = $request->tin;
// 		$restaurant->since = $request->since;
// 		$restaurant->save();

// 		$schedule = Schedule::where('user_id',$user->id)->first();
// 		$schedule->sunday = $request->sunday;
// 		$schedule->monday = $request->monday;
// 		$schedule->tuesday = $request->tuesday;
// 		$schedule->wednesday = $request->wednesday;
// 		$schedule->thursday = $request->thursday;
// 		$schedule->friday = $request->friday;
// 		$schedule->saturday = $request->saturday;
// 		$schedule->shop_open = $request->shop_open;
// 		$schedule->shop_close = $request->shop_close;
// 		$schedule->save();

// 		return back()->with('success','Merchant successfully Updated');
// }

public function get_all_merchants(){
$query = DB::table('merchant')
->leftJoin('users', 'users.id', '=', 'merchant.user_id')
->select('merchant.merchant_id','users.name','users.phone','users.status','merchant.business_name','merchant.bkash_number','merchant.rocket_number','merchant.created_at')
;
return DataTables::of($query)

->editColumn('status', function ($inquiry) {
if ($inquiry->status == 1) return 'Approved';
if ($inquiry->status == 2) return 'Pending';
if ($inquiry->status == 3) return 'Rejected';
return 'No selected';
})
->addColumn('action', function($data){
$button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->merchant_id .'" data-original-title="Edit" class="edit btn btn-success btn-sm edit-post"><i class="bi bi-pencil-square"></i></a>';
$button .= '&nbsp;&nbsp;';
// $button .= '<button name="delete" id="'.$data->merchant_id .'" class="delete btn btn-danger btn-sm confirmDelete" record="Area" recordid="{{$data->AreaID}}"><i class="bi bi-trash-fill"></i></button>';
return $button;
})
->rawColumns(['action'])
->toJson();
}

public function single_merchant_table_information($id){
$data=DB::table('merchant')->where('merchant_id','=',$id)->first();
return response()->json($data);
}
public function update_merchant(Request $request){
// return(dd($request->all()));
$merchant=DB::table('merchant')->where('merchant_id',$request->merchant_id)->first();

$data = array('business_name' => $request->business_name,
'bkash_number' =>$request->bkash_number,
'rocket_number' =>$request->rocket_number,
'nagad_number' =>$request->nagad_number,
'bank_name' =>$request->bank_name,
'account_number' =>$request->account_number,
'account_name' =>$request->account_name,
'payment_method' =>$request->payment_method,
'updated_at' => date('Y-m-d H:i:s'),
);
$user_data=array('status'=>$request->status);

DB::table('merchant')
->where('merchant_id',$request->merchant_id )
->update($data);


session()->flash('success','Update successfully');
return response()->json($data);
}
public function all_merchant(){

return view('admin.extends.user.merchant.manage_merchant');
}

public function pending_merchant(){

return view('admin.extends.user.merchant.pending_merchant');
}

public function rejected_merchant(){
return view('admin.extends.user.merchant.rejected_merchant');
}
public function get_all_pending_merchant(){
$query = DB::table('merchant')
->leftJoin('users', 'users.id', '=', 'merchant.user_id')
->where('users.status',2)
->select('merchant.merchant_id','users.name','users.phone','users.status','merchant.business_name','merchant.bkash_number','merchant.rocket_number','merchant.created_at');

return DataTables::of($query)
->editColumn('status', function ($inquiry) {
if ($inquiry->status == 1) return 'Approved';
if ($inquiry->status == 2) return 'Pending';
if ($inquiry->status == 3) return 'Rejected';
return 'No selected';
})
->addColumn('action', function($data){
$button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->merchant_id .'" data-original-title="Edit" class="edit btn btn-success btn-sm edit-post"><i class="bi bi-pencil-square"></i></a>';
$button .= '&nbsp;&nbsp;';
$button .= '<button name="delete" id="'.$data->merchant_id .'" class="delete btn btn-danger btn-sm confirmDelete" record="Area" recordid="{{$data->AreaID}}"><i class="bi bi-trash-fill"></i></button>';
return $button;
})
->rawColumns(['action'])
->toJson();
}
public function get_all_rejected_merchant(){
$query = DB::table('merchant')
->leftJoin('users', 'users.id', '=', 'merchant.user_id')
->where('users.status',3)
->select('merchant.merchant_id','users.name','users.phone','users.status','merchant.business_name','merchant.bkash_number','merchant.rocket_number','merchant.created_at');

return DataTables::of($query)
->editColumn('status', function ($inquiry) {
if ($inquiry->status == 1) return 'Approved';
if ($inquiry->status == 2) return 'Pending';
if ($inquiry->status == 3) return 'Rejected';
return 'No selected';
})
->addColumn('action', function($data){
$button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->merchant_id .'" data-original-title="Edit" class="edit btn btn-success btn-sm edit-post"><i class="bi bi-pencil-square"></i></a>';
$button .= '&nbsp;&nbsp;';
$button .= '<button name="delete" id="'.$data->merchant_id .'" class="delete btn btn-danger btn-sm confirmDelete" record="Area" recordid="{{$data->AreaID}}"><i class="bi bi-trash-fill"></i></button>';
return $button;
})
->rawColumns(['action'])
->toJson();
}


// public function change_status(Request $request){
// // return(dd($request->all()));
// $status=DB::table('merchant')->where('merchant_id',$request->merchant_id)->first();

// $data = array('status' => $request->status,
// );
// DB::table('merchant')
// ->where('id',$request->id )
// ->update($data);
// session()->flash('success','Update successfully');
// return response()->json($data);
// }
}