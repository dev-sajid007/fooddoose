<?php

namespace App\Http\Controllers\Backend\Merchant;

use App\Http\Controllers\Controller;
use App\Models\Backend\Extra;
use App\Models\Backend\ExtraFood;
use App\Models\Backend\Food;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;


class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return null
     */
    public function index()
    {
        $foods = Food::with('restaurant', 'category')->orderBy('id', 'desc')->get();

        return view('merchant.food.foodList', compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return null
     */
    public function create()
    {
        $restaurants = Restaurant::where('user_id', Auth::id())->where('status', 1)->with('categories')->get();
//        dd($restaurants);
        $extras = Extra::all();
        return view('merchant.food.foodCreate', compact('restaurants', 'extras'));
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
            'restaurant_id' => 'required',
            'category_id' => 'required',
            'quantity' => 'required',
            'price' => 'required',
        ]);
        $food = new Food;
        $food->category_id = $request->category_id;
        $food->restaurant_id = $request->restaurant_id;
        $food->name = $request->name;
        $food->food_code = substr(Str::upper($request->name), 0, 3) . '-' . rand(5, 99999);
        $food->quantity = $request->quantity;
        $food->price = $request->price;
        $food->short_description = $request->short_description;
        $food->long_description = $request->long_description;
        $food->slug = Str::slug($request->name, "-");
        $food->delivery_time = $request->delivery_time;
        $food->status = 1;
        if ($request->is_discount) {
            $food->discount_type = $request->discount_type;
            $food->discount_price = $request->discount_price;
        }
        if ($request->hasFile('image')) {
            $get_image = $request->file('image');
            $image = 'image-' . str_replace(' ', '_', Str::lower($request->name)) . time() . "." . $get_image->extension();
            $get_image->move(Food::PATH, $image);
            $food->image = $image;
        }
        if ($request->hasFile('logo')) {
            $get_log = $request->file('logo');
            $logo = 'logo-' . str_replace(' ', '_', Str::lower($request->name)) . time() . "." . $get_log->extension();
            $get_log->move(Food::PATH, $logo);
            $food->logo = $logo;
        }
        $food->save();

        if ($request->extra_item) {
            for ($i = 0; $i < count($request->extra_item); $i++) {
                $extra_food = new ExtraFood;
                $extra_food->extra_id = $request->extra_item[$i];
                $extra_food->food_id = $food->id;
                $extra_food->save();
            }
        }
        return redirect()->route('merchant.food.index')->with('message_success', 'Food has been added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return null
     */
    public function show($id)
    {
        $food = Food::where('id', $id)->with('restaurant', 'category', 'extra_foods')->first();
        return view('merchant.food.foodDetails', compact('food'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return null
     */
    public function edit($id)
    {
        $food = Food::where('id', $id)->with('restaurant', 'category', 'extra_foods')->first();
        $restaurants = Restaurant::where('user_id', Auth::id())->where('status', 1)->with('restaurant_categories')->get();
        $extras = Extra::all();
        return view('merchant.food.foodEdit', compact('food', 'restaurants', 'extras'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return null
     */
    public function food_status($id)
    {
        $food = Food::where('id', $id)->first();
        if ($food->status == 1) {
            Food::where('id', $id)->update(['status' => 0]);
            return back()->with('message_success', 'Food status has been deactived successfully!');
        } else {
            Food::where('id', $id)->update(['status' => 1]);
            return back()->with('message_success', 'Food Status has been actived successfully!');
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
        $food = Food::where('id', $id)->first();
        if ($request->hasFile('image')) {
            if (File::exists(Food::PATH . DIRECTORY_SEPARATOR . $food->image)) {
                File::delete(Food::PATH . DIRECTORY_SEPARATOR . $food->image);
            }
            $get_image = $request->file('image');
            $image = 'image-' . str_replace(' ', '_', $request->full_name) . time() . "." . $get_image->extension();
            $get_image->move(Food::PATH, $image);
            $photo = $image;
        }else {
            $photo = $food->image;
        }


        $data = array(
            'name' => $request->name,
            'restaurant_id' => $request->restaurant_id,
            'category_id' => $request->category_id,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'slug' => Str::slug($request->name, "-"),
            'delivery_time' => $request->delivery_time,
            'status' => 1,
            'image' => $photo
        );
        Food::where('id', $id)->update($data);
        return back()->with('message_success', 'Food information has been updated successfully!');
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
