<?php


namespace App\Http\Controllers\FrontEnd\CustomerManagment;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\{JWTAuth};
use App\Models\Backend\Order;
use App\Http\Resources\frontend\Customer\CustomerDashboard\CustomerDashboardOrder;

class CustomerDashboardController extends Controller
{
    protected $customer;

    public function __construct()
    {
//        $this->customer = JWTAuth::parseToken()->authenticate();
    }

    public function limited_confirm_order_list()
    {
        $limited_confirm_order = Order::with('order_foods')
            ->where('user_id', JWTAuth::parseToken()->authenticate()->id)
            ->where('status', 'deliver')
            ->limit(10)
            ->get();
        return CustomerDashboardOrder::collection($limited_confirm_order);
    }

    public function limited_pending_order_list()
    {
        $pending_order = Order::with('order_foods')
            ->where('user_id', JWTAuth::parseToken()->authenticate()->id)
            ->where('status', '=', 'created')
            ->limit(10)
            ->get();
        return CustomerDashboardOrder::collection($pending_order);
    }

    public function limited_order_filter(Request $request)
    {
        $limited_order = Order::with('order_foods')
            ->where('user_id', JWTAuth::parseToken()->authenticate()->id)
            ->where('status', '=', $request->order_type)
            ->limit(10)
            ->get();
        return CustomerDashboardOrder::collection($limited_order);

    }

//    paginate order
    public function pending_order_list()
    {
        $all_pending_order = Order::with('order_foods')
            ->where('user_id', JWTAuth::parseToken()->authenticate()->id)
            ->where('status', '=', 'created')
            ->latest()
            ->paginate(10);
        return CustomerDashboardOrder::collection($all_pending_order);
    }

    public function confirm_order_list()
    {
        $all_confirm_order = Order::with('order_foods')
            ->where('user_id', JWTAuth::parseToken()->authenticate()->id)
            ->where('status', '=', 'deliver')
            ->latest()
            ->paginate(10);
        return CustomerDashboardOrder::collection($all_confirm_order);
    }

    public function order_filter(Request $request)
    {
        if ($request->order_status != null) {
            $order_status = $request->order_status;

        } else {
            $order_status = 'created';

        }
        if ($request->start_date == null) {
            $start_date = Carbon::now();
        } else {
            $start_date = $request->start_date;
        }


        if ($request->start_date == null && $request->end_date == null) {
            $all_order_list = Order::with('order_foods')
                ->where('user_id', JWTAuth::parseToken()->authenticate()->id)
                ->where('status', '=', $order_status)
                ->latest()
                ->paginate(10);
            return CustomerDashboardOrder::collection($all_order_list);

        } else if ($request->end_date != null) {
            $end_date = $request->end_date;
            $all_order_list = Order::with('order_foods')
                ->where('user_id', JWTAuth::parseToken()->authenticate()->id)
                ->where('status', '=', $order_status)
                ->WhereDate('created_at', '>=', $start_date)
                ->whereDate('created_at', '<=', $end_date)
                ->latest()
                ->paginate(10);
            return CustomerDashboardOrder::collection($all_order_list);

        }

        return ('logic not working');


    }

    public function order_type($type)
    {
        $all_order_list = Order::with('order_foods')
            ->where('user_id', JWTAuth::parseToken()->authenticate()->id)
            ->where('status', '=', $type)
            ->latest()
            ->paginate(10);
        return CustomerDashboardOrder::collection($all_order_list);

    }


}
