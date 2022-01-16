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
use Validator;
use App\Models\Merchant;
use App\Models\Schedule;
use App\Models\Restaurant;
class ScheduleController extends Controller
{
public function create(){
		return view('admin.extends.user.schedule.create_schedule');
	}

public function edit($schedule_id){
	// return $id; 
$schedule = Schedule::find($schedule_id);
return view('admin.extends.user.schedule.edit-schedule',compact('schedule'));
}
	

	public function update(Request $request, $id){
		$schedule = Schedule::find($id);
		$schedule->sunday = $request->sunday;
		$schedule->monday = $request->monday;
		$schedule->tuesday = $request->tuesday;
		$schedule->wednesday = $request->wednesday;
		$schedule->thursday = $request->thursday;
		$schedule->friday = $request->friday;
		$schedule->saturday = $request->saturday;
		$schedule->shop_open = $request->shop_open;
		$schedule->shop_close = $request->shop_close;
		$schedule->save();

		return back()->with('success','Schedule successfully Updated');
}

	public function single_schedule_info($id){
	$data=DB::table('schedule')->where('schedule_id','=',$id)->first();
	return response()->json($data);
	
}

public function get_all_schedule(){
$query = DB::table('schedule')
->leftJoin('restaurant', 'restaurant.restaurant_id', '=', 'schedule.restaurant_id')
->select('schedule.schedule_id','restaurant.restaurant_name','schedule.sunday','schedule.monday','schedule.tuesday','schedule.wednesday','schedule.thursday','schedule.friday','schedule.saturday','schedule.shop_open','shop_close');
return DataTables::of($query)
->editColumn('sunday', function ($inquiry) {
if ($inquiry->sunday == 1) return 'Open';
if ($inquiry->sunday == 'null') return 'Close';
return 'Close';
})
->editColumn('monday', function ($inquiry) {
if ($inquiry->monday == 1) return 'Open';
if ($inquiry->monday == 'null') return 'Close';
return 'Close';
})
->editColumn('tuesday', function ($inquiry) {
if ($inquiry->tuesday == 1) return 'Open';
if ($inquiry->tuesday == 'null') return 'Close';
return 'Close';
})
->editColumn('wednesday', function ($inquiry) {
if ($inquiry->wednesday == 1) return 'Open';
if ($inquiry->wednesday == 'null') return 'Close';
return 'Close';
})
->editColumn('thursday', function ($inquiry) {
if ($inquiry->thursday == 1) return 'Open';
if ($inquiry->thursday == 'null') return 'Close';
return 'Close';
})
->editColumn('friday', function ($inquiry) {
if ($inquiry->friday == 1) return 'Open';
if ($inquiry->friday == 'null') return 'Close';
return 'Close';
})
->editColumn('saturday', function ($inquiry) {
if ($inquiry->saturday == 1) return 'Open';
if ($inquiry->saturday == 'null') return 'Close';
return 'Close';
})
->addColumn('action', function($data){
$button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->schedule_id .'" data-original-title="Edit" class="edit btn btn-success btn-sm edit-post"><i class="bi bi-pencil-square"></i></a>';
$button .= '&nbsp;&nbsp;';


return $button;
})
->rawColumns(['action'])
->toJson();
}
public function all_schedule(){

return view('admin.extends.user.schedule.manage_schedule');
}



public function update_schedule(Request $request){
// return(dd($request->all()));
$select_team_image=DB::table('schedule')->where('schedule_id',$request->schedule_id)->first();

$data = array('sunday' => $request->sunday,
'monday' =>$request->monday,
'tuesday' =>$request->tuesday,
'wednesday' =>$request->wednesday,
'thursday' =>$request->thursday,
'friday' =>$request->friday,
'saturday' =>$request->thursday,
'shop_open' =>$request->shop_open,
'shop_close' =>$request->shop_close,
'updated_at' => date('Y-m-d H:i:s'),
);
DB::table('schedule')
->where('schedule_id',$request->schedule_id )
->update($data);
session()->flash('success','Update successfully');
return response()->json($data);
}


}