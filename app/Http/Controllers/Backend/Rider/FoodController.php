<?php

namespace App\Http\Controllers\Backend\Merchant;

use App\Http\Controllers\Controller;
use App\Models\Backend\Extra;
use App\Models\Backend\ExtraFood;
use App\Models\Backend\Food;
use App\Models\Backend\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = Food::with('restaurant', 'category')->get();
        return view('merchant.food.foodList',compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return null
     */
    public function create()
    {
        $restaurants = Restaurant::where('user_id', 5)->where('status', 1)->with('categories')->get();
        $extras = Extra::all();
        return view('merchant.food.foodCreate' ,compact('restaurants', 'extras'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $food = new Food;
        $food->category_id = $request->category_id;
        $food->restaurant_id = $request->restaurant_id;
        $food->name = $request->name;
        $food->food_code = substr(Str::upper($request->name), 0, 3). '-' . rand(5, 99999);
        $food->quantity = $request->quantity;
        $food->price = $request->price;
        $food->short_description = $request->short_description;
        $food->long_description = $request->long_description;
        $food->slug = Str::slug($request->name, "-");
        $food->status = 1;
        if ($request->is_discount) {
            $food->discount_type = $request->discount_type;
            $food->discount_price = $request->discount_price;
        }
        if ($request->hasFile('image')) {
            $get_image = $request->file('image');
            $image = str_replace(' ', '_', Str::lower($request->name)) . time() . "." . $get_image->extension();
            $get_image->move(Food::PATH, $image);
            $food->image = $image;
        }
        $food->save();

        for($i=0; $i<count($request->extra_item); $i++){
            $extra_food = new ExtraFood;
            $extra_food->extra_id = $request->extra_item[$i];
            $extra_food->food_id = $food->id;
            $extra_food->save();
        }

        return redirect()->route('merchant.food.index');
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
