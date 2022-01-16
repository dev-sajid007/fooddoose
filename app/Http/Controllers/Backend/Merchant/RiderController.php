<?php

namespace App\Http\Controllers\Backend\Merchant;

use App\Http\Controllers\Controller;
use App\Models\Backend\Order;
use App\Models\User;
use App\Models\Rider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RiderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return null
     */
    public function index()
    {
        $users = User::where('user_type', 'rider')->get();
        return view('merchant.rider.riderList', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('merchant.rider.riderCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'phone' => 'required',
            'address' => 'required',
            'password' => 'required',
        ]);

        $rider = new User;
        $rider->name = $request->name;
        $rider->email = $request->email;
        $rider->phone = $request->phone;
        $rider->address = $request->address;
        $rider->user_type = 'rider';
        $rider->status = 1;
        $rider->password = Hash::make($request->password);

        if ($request->hasFile('image')) {
            $get_image = $request->file('image');
            $image = 'profile-' . str_replace(' ', '_', Str::lower($request->name)) . time() . "." . $get_image->extension();
            $get_image->move(User::PATH, $image);
            $rider->photo = $image;
        }

        $rider->save();

        $merchant_rider = new Rider;
        $merchant_rider->user_id = $rider->id;
        $merchant_rider->merchant_id = auth()->id();
        $merchant_rider->save();


        return redirect()->route('merchant.rider.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function get_rider()
    {
        $rider = User::where('id',request()->input('id'))->first();
        return response()->json($rider);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return null
     */
    public function assign_rider(Request $request)
    {
        Order::where('id', $request->order_id)->update(['rider_id' => $request->rider_id, 'delivery_status' => $request->delivery_status, 'status' => 'pending']);

        return back()->with('message_success', 'Order has been processed successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return null
     */
    public function rider_status($id)
    {
        $rider = User::where('id', $id)->first();
        if ($rider->status == 1) {
            User::where('id', $id)->update(['status' => 0]);
            return back()->with('message_success', 'Rider has been deactived successfully!');
        } else {
            User::where('id', $id)->update(['status' => 1]);
            return back()->with('message_success', 'Rider has been actived successfully!');
        }
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
