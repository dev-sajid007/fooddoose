<?php
namespace App\Http\Controllers\Backend\Admin\Orders;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use DB;
use Validator;
use Response;

use App\Models\Backend\Order;
use App\Models\User;

class OrderController extends Controller

{
public function show_order(){
    $riders = User::where('user_type', 'rider')->where('status', 1)->get();
return view('admin.extends.orders.manage_order',compact('riders'));
}

public function created_order(){
return view('admin.extends.orders.created_order');
}


public function pending_order(){
return view('admin.extends.orders.pending_order');
}

public function confirm_order(){
return view('admin.extends.orders.confirm_order');
}

public function process_order(){
return view('admin.extends.orders.process_order');
}
public function deliver_order(){
return view('admin.extends.orders.deliver_order');
}

public function waiting_order(){
return view('admin.extends.orders.waiting_order');
}
public function return_order(){
return view('admin.extends.orders.return_order');
}
public function reject_order(){
return view('admin.extends.orders.reject_order');
}


public function get_all_orders(){
$query = DB::table('orders')
->leftJoin('users', 'users.id', '=', 'orders.user_id')
->select('orders.id','orders.rider_id','orders.order_No','orders.customer_name','orders.email','orders.contact_no','orders.subtotal','orders.total','orders.status','orders.transaction_no','orders.created_at');
return DataTables::of($query)
->addColumn('action', function($data){
$button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id .'" data-original-title="Edit" class="edit btn btn-success btn-sm edit-post"><i class="bi bi-pencil-square"></i></a>';
$button .= '&nbsp;&nbsp;';
$button .= '<button name="delete" id="'.$data->id .'" class="delete btn btn-danger btn-sm confirmDelete" record="Area" recordid="{{$data->AreaID}}"><i class="bi bi-trash-fill"></i></button>';
$button .= '&nbsp;&nbsp;';
if (!$data->rider_id){
    $button .= '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id .'" data-original-title="Assign" class="edit btn btn-info btn-sm assign-rider" ><i class="bi bi-arrow-bar-right"></i></a>';
}else{
    $button .= '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id .'" data-original-title="Assign" class="edit btn btn-info btn-sm assign-rider disabled" ><i class="bi bi-arrow-bar-right"></i></a>';
}
return $button;
})
->rawColumns(['action'])
->toJson();
}


public function get_created_orders(){
$query = DB::table('orders')
->leftJoin('users', 'users.id', '=', 'orders.user_id')
->where('orders.status','created')
->select('orders.id','orders.order_No','orders.customer_name','orders.email','orders.contact_no','orders.subtotal','orders.total','orders.status','orders.transaction_no','orders.created_at');

return DataTables::of($query)
->addColumn('action', function($data){
$button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id .'" data-original-title="Edit" class="edit btn btn-success btn-sm edit-post"><i class="bi bi-pencil-square"></i></a>';
$button .= '&nbsp;&nbsp;';
$button .= '<button name="delete" id="'.$data->id .'" class="delete btn btn-danger btn-sm confirmDelete" record="Area" recordid="{{$data->AreaID}}"><i class="bi bi-trash-fill"></i></button>';
return $button;
})
->rawColumns(['action'])
->toJson();
}

public function get_pending_orders(){
$query = DB::table('orders')
->leftJoin('users', 'users.id', '=', 'orders.user_id')
->where('orders.status','pending')
->select('orders.id','orders.order_No','orders.customer_name','orders.email','orders.contact_no','orders.subtotal','orders.total','orders.status','orders.transaction_no','orders.created_at');

return DataTables::of($query)
->addColumn('action', function($data){
$button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id .'" data-original-title="Edit" class="edit btn btn-success btn-sm edit-post"><i class="bi bi-pencil-square"></i></a>';
$button .= '&nbsp;&nbsp;';
$button .= '<button name="delete" id="'.$data->id .'" class="delete btn btn-danger btn-sm confirmDelete" record="Area" recordid="{{$data->AreaID}}"><i class="bi bi-trash-fill"></i></button>';
return $button;
})
->rawColumns(['action'])
->toJson();
}

public function get_confirm_orders(){
$query = DB::table('orders')
->leftJoin('users', 'users.id', '=', 'orders.user_id')
->where('orders.status','confirm')
->select('orders.id','orders.order_No','orders.customer_name','orders.email','orders.contact_no','orders.subtotal','orders.total','orders.status','orders.transaction_no','orders.created_at');

return DataTables::of($query)
->addColumn('action', function($data){
$button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id .'" data-original-title="Edit" class="edit btn btn-success btn-sm edit-post"><i class="bi bi-pencil-square"></i></a>';
$button .= '&nbsp;&nbsp;';
$button .= '<button name="delete" id="'.$data->id .'" class="delete btn btn-danger btn-sm confirmDelete" record="Area" recordid="{{$data->AreaID}}"><i class="bi bi-trash-fill"></i></button>';
return $button;
})
->rawColumns(['action'])
->toJson();
}

public function get_process_orders(){
$query = DB::table('orders')
->leftJoin('users', 'users.id', '=', 'orders.user_id')
->where('orders.status','process')
->select('orders.id','orders.order_No','orders.customer_name','orders.email','orders.contact_no','orders.subtotal','orders.total','orders.status','orders.transaction_no','orders.created_at');
return DataTables::of($query)
->addColumn('action', function($data){
$button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id .'" data-original-title="Edit" class="edit btn btn-success btn-sm edit-post"><i class="bi bi-pencil-square"></i></a>';
$button .= '&nbsp;&nbsp;';
$button .= '<button name="delete" id="'.$data->id .'" class="delete btn btn-danger btn-smconfirmDelete" record="Area" recordid="{{$data->AreaID}}"><i class="bi bi-trash-fill"></i></button>';
return $button;
})
->rawColumns(['action'])
->toJson();
}

public function get_deliver_orders(){
$query = DB::table('orders')
->leftJoin('users', 'users.id', '=', 'orders.user_id')
->where('orders.status','deliver')
->select('orders.id','orders.order_No','orders.customer_name','orders.email','orders.contact_no','orders.subtotal','orders.total','orders.status','orders.transaction_no','orders.created_at');
return DataTables::of($query)
->addColumn('action', function($data){
$button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id .'" data-original-title="Edit" class="edit btn btn-success btn-sm edit-post"><i class="bi bi-pencil-square"></i></a>';
$button .= '&nbsp;&nbsp;';
$button .= '<button name="delete" id="'.$data->id .'" class="delete btn btn-danger btn-sm confirmDelete" record="Area" recordid="{{$data->AreaID}}"><i class="bi bi-trash-fill"></i></button>';
return $button;
})
->rawColumns(['action'])
->toJson();
}




public function get_hold_orders(){
$query = DB::table('orders')
->leftJoin('users', 'users.id', '=', 'orders.user_id')
->where('orders.status','hold')
->select('orders.id','orders.order_No','orders.customer_name','orders.email','orders.contact_no','orders.subtotal','orders.total','orders.status','orders.transaction_no','orders.created_at');
return DataTables::of($query)
->addColumn('action', function($data){
$button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id .'" data-original-title="Edit" class="edit btn btn-success btn-sm edit-post"><i class="bi bi-pencil-square"></i></a>';
$button .= '&nbsp;&nbsp;';
$button .= '<button name="delete" id="'.$data->id .'" class="delete btn btn-danger btn-sm confirmDelete" record="Area" recordid="{{$data->AreaID}}"><i class="bi bi-trash-fill"></i></button>';
return $button;
})
->rawColumns(['action'])
->toJson();
}

public function get_return_orders(){
$query = DB::table('orders')
->leftJoin('users', 'users.id', '=', 'orders.user_id')
->where('orders.status','return')
->select('orders.id','orders.order_No','orders.customer_name','orders.email','orders.contact_no','orders.subtotal','orders.total','orders.status','orders.transaction_no','orders.created_at');
return DataTables::of($query)
->addColumn('action', function($data){
$button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id .'" data-original-title="Edit" class="edit btn btn-success btn-sm edit-post"><i class="bi bi-pencil-square"></i></a>';
$button .= '&nbsp;&nbsp;';
$button .= '<button name="delete" id="'.$data->id .'" class="delete btn btn-danger btn-sm  confirmDelete" record="Area" recordid="{{$data->AreaID}}"><i class="bi bi-trash-fill"></i></button>';
return $button;
})
->rawColumns(['action'])
->toJson();
}

public function get_reject_orders(){
$query = DB::table('orders')
->leftJoin('users', 'users.id', '=', 'orders.user_id')
->where('orders.status','reject')
->select('orders.id','orders.order_No','orders.customer_name','orders.email','orders.contact_no','orders.subtotal','orders.total','orders.status','orders.transaction_no','orders.created_at');
return DataTables::of($query)
->addColumn('action', function($data){
$button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id .'" data-original-title="Edit" class="edit btn btn-success btn-sm edit-post"><i class="bi bi-pencil-square"></i></a>';
$button .= '&nbsp;&nbsp;';
$button .= '<button name="delete" id="'.$data->id .'" class="delete btn btn-danger btn-sm confirmDelete" record="Area" recordid="{{$data->AreaID}}"><i class="bi bi-trash-fill"></i></button>';
return $button;
})
->rawColumns(['action'])
->toJson();
}







public function delete_order_api($id){
$select_order_info=DB::table('salaries')->where('id','=',$id)->first();

DB::table('salaries')
->where('id','=',$id)
->delete();
return 'successfully deleted';
}

public function single_order_table_information($id){
$order_mapping=json_encode(DB::table('order_food')
    ->leftjoin('food','food.id','order_food.food_id')
    ->where('order_food.order_id',$id)
    ->select('order_food.id','order_food.order_id','order_food.food_id','order_food.price','order_food.quantity','order_food.total_price','food.name')
    ->get());
$extra_item_mapping=DB::table('order_extra_item')->where('order_id',$id)->get();

if($extra_item_mapping->isEmpty() ){
$extra_order_item=null;
}

foreach ($extra_item_mapping as $key => $extra_item_mapping_info) {
$select_extra_food=DB::table('extras')->where('id',$extra_item_mapping_info->extra_item_id)->first();
$select_food=DB::table('food')->where('id','=',$extra_item_mapping_info->food_id)->first();

if($select_extra_food !=null){
$extra_order_item[] =array(
'serial_num'=>$key,
'order_extra_item_id' => $extra_item_mapping_info->extra_item_id,
'order_extra_item_name' => $select_extra_food->name,
'food_id' => $extra_item_mapping_info->food_id,
'food_name' => $select_food->name,
'quantity' => $extra_item_mapping_info->quantity,
'price' => $extra_item_mapping_info->price,
'total_price' => $extra_item_mapping_info->total_price,
); 
}
}


$select_single_order=DB::table('orders')->where('id','=',$id)->first();
if($select_single_order !=null){
 $rider_info=DB::table('users')
 ->where('id','=',$select_single_order->rider_id)
 ->select('id','name','email','phone')
 ->first();
}

else{
$rider_info=null;

   
}


// $order_mapping=DB::table('order_food')->where('order_id',$id)->get();
$data=DB::table('orders')->where('id','=',$id)->first();
return response()->json(['order_info'=>$data,'order_mapping'=>$order_mapping,'extra_item'=>$extra_order_item,'rider_info'=>$rider_info]);  
}


public function update_order(Request $request){
// return(dd($request->all()));
$order=DB::table('orders')->where('id',$request->id)->first();
$data = array('status' => $request->status,
);
DB::table('orders')
->where('id',$request->id )
->update($data);
return response()->json($data);
}





}
