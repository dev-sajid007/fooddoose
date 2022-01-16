<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Backend\Food;
use App\Models\Backend\RestaurantCategory;
use App\Models\Restaurant;
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
        $restaurants = Restaurant::where('status', 1)->orderBy('restaurant_id','desc')->get();
        return response()->json(['status' => 200, 'restaurants' => $restaurants]);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return null
     */
    public function show($slug)
    {
        $restaurant = Restaurant::select('restaurant_id')->where('slug', $slug)->first();
        $foods = Food::where('restaurant_id', $restaurant->restaurant_id)->with('extra_foods')->get();
        $categories = RestaurantCategory::where('restaurant_id', $restaurant->restaurant_id)->with('category')->get();

//        $food = [];

//        if ($restaurant->restaurant_categories) {
//            for ($i = 0; $i < count($restaurant->restaurant_categories); $i++) {
//                $data = $restaurant->restaurant_categories[$i]->foods;
//                array_push($food, (object)$data);
//            }
//        }

        return response()->json([
            'restaurant' => $restaurant,
            'schedule' => $restaurant->schedule,
//            'categories' => $restaurant->restaurant_categories,
            'categories' => $categories,
            'foods' => $foods
//            'foods' => gettype($data)
        ]);
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
     * @return null
     */
    public function restaurant_search(Request $request)
    {
        $restaurant = Restaurant::where('restaurant_name', 'LIKE', '%' . $request->search . '%')->get();
        return response()->json($restaurant);
    }
}
