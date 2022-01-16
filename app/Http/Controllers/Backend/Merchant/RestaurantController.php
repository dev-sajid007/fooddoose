<?php

namespace App\Http\Controllers\Backend\Merchant;

use App\Http\Controllers\Controller;
use App\Models\Backend\Food;
use App\Models\Restaurant;
use App\Models\Schedule;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return null
     */
    public function index()
    {
        $restaurants = Restaurant::where('user_id', Auth::id())->get();

        return view('merchant.restaurant.restaurantList', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return null
     */
    public function create()
    {
        return view('merchant.restaurant.restaurantCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return null
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'tin' => 'required',
            'address' => 'required',
            'contact_no' => 'required',
        ]);
//        return $request;
        $restaurant = new Restaurant;
        $restaurant->restaurant_name = $request->name;
        $restaurant->user_id = auth()->id();
        $restaurant->merchant_id = auth()->id();
        $restaurant->restaurant_code = "rest-" . rand(5, 99999);
        $restaurant->longitude = $request->longitude;
        $restaurant->latitude = $request->latitude;
        $restaurant->url_link = $request->url_link;
        $restaurant->address = $request->address;
        $restaurant->contact_no = $request->contact_no;
        $restaurant->tin = $request->tin;
        $restaurant->since = $request->since;
        $restaurant->slug = Str::slug($request->name, "-");
        if ($request->hasFile('image')) {
            $get_image = $request->file('image');
            $image = 'image-' . str_replace(' ', '_', Str::lower($request->name)) . time() . "." . $get_image->extension();
            $get_image->move(Restaurant::PATH, $image);
            $restaurant->image = $image;
        }
        $restaurant->status = 1;
        $restaurant->save();

        $schedule = new Schedule;
        $schedule->user_id = Auth::id();
        $schedule->restaurant_id = $restaurant->id;
        $schedule->sunday = $request->sunday;
        $schedule->monday = $request->monday;
        $schedule->tuesday = $request->tuesday;
        $schedule->wednesday = $request->wednesday;
        $schedule->thursday = $request->thursday;
        $schedule->friday = $request->friday;
        $schedule->saturday = $request->saturday;
        $schedule->shop_open = $request->opening_time;
        $schedule->shop_close = $request->closing_time;
        $schedule->save();

        return redirect()->route('merchant.restaurant.index')->with('message_success', 'Restaurant has been created successfully!');
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
     * @return null
     */
    public function edit($id)
    {
        $restaurant = Restaurant::where('restaurant_id', $id)->with('schedule')->first();
//        return $restaurant->schedule;
        return view('merchant.restaurant.restaurantEdit', compact('restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return null
     */
    public function change_status($id)
    {
        $restaurant = Restaurant::where('restaurant_id', $id)->first();
        if ($restaurant->status == 1) {
            Restaurant::where('restaurant_id', $id)->update(['status'=>0]);
            return back()->with('message_success', 'Restaurant has been deactived successfully!');
        } else {
            Restaurant::where('restaurant_id', $id)->update(['status'=>1]);
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
        $restaurant = Restaurant::where('restaurant_id', $id)->first();
        if ($request->hasFile('image')) {
            if (File::exists(Restaurant::PATH . DIRECTORY_SEPARATOR . $restaurant->image)) {
                File::delete(Restaurant::PATH . DIRECTORY_SEPARATOR . $restaurant->image);
            }
            $get_image = $request->file('image');
            $image = 'image-' . str_replace(' ', '_', Str::lower($request->name)) . time() . "." . $get_image->extension();
            $get_image->move(Restaurant::PATH, $image);
            $photo = $image;

        }else {
            $photo = $restaurant->image;
        }

        $restaurant_data = array(
            'restaurant_name' => $request->name,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'url_link' => $request->url_link,
            'address' => $request->address,
            'contact_no' => $request->contact_no,
            'tin' => $request->tin,
            'since' => $request->since,
            'image' => $photo
        );

        Restaurant::where('restaurant_id', $id)->update($restaurant_data);

        $schedule_data = array(
            'sunday' => $request->sunday,
            'monday' => $request->monday,
            'tuesday' => $request->tuesday,
            'wednesday' => $request->wednesday,
            'thursday' => $request->thursday,
            'friday' => $request->friday,
            'saturday' => $request->saturday,
            'shop_open' => $request->opening_time,
            'shop_close' => $request->closing_time,
        );

        Schedule::where('restaurant_id', $id)->update($schedule_data);

        return back()->with('message_success', 'Restaurant has been updated successfully!');
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
