<?php

namespace App\Http\Controllers\Backend\Rider;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Backend\Order;
use Auth;

class OrderController extends Controller
{
    
    public function pending_order_list()
    {
        $orders = Order::where('rider_id',Auth::user()->id)->where('status', 'confirm')->orderBy('id','desc')->paginate(10);
        return view('rider.order.orderList', compact('orders'));

    }


    public function all_order_list()
    {
        $orders = Order::where('rider_id',Auth::user()->id)->orderBy('id','desc')->paginate(10);
        return view('rider.order.allorderList', compact('orders'));

    }
    
     public function change_order_list(Request $request, $id)
    {
        $order = Order::find($id);
        $order->status =$request->status;
        $order->save();
        return redirect()->back()->with('message_success','Order Status Changed successfully ');

    }

   
}
