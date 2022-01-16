<?php

namespace App\Http\Controllers\Backend\Merchant;

use App\Http\Controllers\Controller;
use App\Models\Backend\Restaurant;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return null
     */
    public function index()
    {
        $restaurants = Restaurant::where('user_id', 2)->get();
        return view('merchant.restaurant.restaurantList', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('merchant.restaurant.restaurantCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $restaurant = new Restaurant;
        $restaurant->name = $request->name;
        $restaurant->user_id = 2;
        $restaurant->restaurant_code = "rest-" . rand(5, 99999);
        $restaurant->longitude = $request->longitude;
        $restaurant->latitude = $request->latitude;
        $restaurant->url_link = $request->url_link;
        $restaurant->address = $request->address;
        $restaurant->contact_no = $request->contact_no;
        $restaurant->tin = $request->tin;
        $restaurant->since = $request->since;
        $restaurant->status = 1;
        $restaurant->save();

        return redirect()->route('merchant.restaurant.index')->with('message_success', 'Restaurant has been created successfully!');;
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return null
     */
    public function change_status($id)
    {
        $restaurant = Restaurant::find($id);
        if ($restaurant->status == 1) {
            $restaurant->status = 0;
            $restaurant->update();
            return back()->with('message_success', 'Restaurant has been deactived successfully!');
        } else {
            $restaurant->status = 1;
            $restaurant->update();
            return back()->with('message_success', 'Restaurant has been actived successfully!');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
