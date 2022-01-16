<?php

namespace App\Http\Controllers\Backend\Merchant;

use App\Http\Controllers\Controller;
use App\Models\Backend\Order;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return null
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Order::where('merchant_id', Auth::id())->with('user', 'order_foods')->orderBy('id', 'desc');
//            dd($data);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function($row){
                    if($row->status == 'pending'){
                        return '<span>Pending</span>';
                    }elseif($row->status == 'process'){
                        return '<span>Process</span>';
                    }elseif($row->status == 'reject'){
                        return '<span>Reject</span>';
                    }elseif($row->status == 'deliver'){
                        return '<span>Delivery</span>';
                    }elseif($row->status == 'created'){
                        return '<span>Created</span>';
                    }elseif($row->status == 'hold'){
                        return '<span>Hold</span>';
                    }elseif($row->status == 'accept'){
                        return '<span>Accept</span>';
                    }
                })
                ->filter(function ($instance) use ($request) {
                    if ($request->get('status') == 'pending' || $request->get('status') == 'process' || $request->get('status') == 'created' || $request->get('status') == 'hold'|| $request->get('status') == 'reject' || $request->get('status') == 'deliver' || $request->get('status') == 'accept') {
                        $instance->where('status', $request->get('status'));
                    }
                    if ($request->get('created_at')) {
                        $instance->whereDate('created_at', $request->get('created_at'));
                    }
                })
                ->rawColumns(['status'])
                ->make(true);
        }

        return view('merchant.order.orderList');
    }

    /**
     * Display a listing of the resource.
     *
     * @return null
     */
    public function waiting_order_index(Request $request)
    {
        return view('merchant.order.orderWaitingList');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pending_order_index(Request $request)
    {
        if ($request->ajax()) {
            $data = Order::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function($row){
                    if($row->status == 'pending'){
                        return '<span>Pending</span>';
                    }elseif($row->status == 'process'){
                        return '<span>Process</span>';
                    }elseif($row->status == 'reject'){
                        return '<span>Process</span>';
                    }elseif($row->status == 'deliver'){
                        return '<span>Delivery</span>';
                    }
                })
                ->filter(function ($instance) use ($request) {
                    if ($request->get('status') == 'pending' || $request->get('status') == 'process') {
                        $instance->where('status', $request->get('status'));
                    }
                })
                ->rawColumns(['status'])
                ->make(true);
        }

        // return view('user');
        // $orders = Order::where('status', 'pending')->get();
        return view('merchant.order.orderList');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function reject_order(Request $request)
    {
        Order::where('id',$request->order_id)->update(['reject_issue' => $request->reject_issue, 'status' => 'reject']);
        return back()->with('message_error', 'Order has been rejected!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return null
     */
    public function show($id)
    {
        $order = Order::where('id', $id)->with('order_foods','order_extra_foods')->first();
        $users = User::where('user_type', 'rider')->where('status',1)->with('rider')->get();
        $riders = [];

        for ($i=0; $i<count($users); $i++){
            if ($users[$i]->rider){
                array_push($riders,$users[$i]);
            }
        }
//        return $riders;
        return view('merchant.order.orderDetails',compact('order' , 'riders'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return null
     */
    public function order_invoice($id)
    {
        $order = Order::where('id', $id)->with('order_foods')->first();

        return view('merchant.order.orderInvoice',compact('order'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return null
     */
    public function order_status($id)
    {
        $order = Order::where('id', $id)->update(['status' => 'accept']);
        return back()->with('message_warning', 'Order has been added successfully! Please assign the driver');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
