<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Backend\Food;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return null
     */
    public function index()
    {
        $foods = Food::with('extra_foods','user_reviews')->where('status', 1)->orderBy('id', 'desc')->get();
        $extra_foods = [];
        $user_reviews = [];
        for ($i=0; $i<count($foods); $i++)
        {
            $food_data = $foods[$i]->extra_foods;
            array_push($extra_foods, $food_data);
            $review_data = $foods[$i]->extra_foods;
            array_push($user_reviews, $review_data);
        }
        return response()->json(['status' => 200, 'foods' => $foods, 'extra_foods' => $extra_foods, 'user_reviews' => $user_reviews]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return null
     */
    public function food_paginate()
    {
        $foods = Food::with('extra_foods','user_reviews')->where('status', 1)->orderBy('id', 'desc')->paginate(20);
        $extra_foods = [];
        $user_reviews = [];
        for ($i=0; $i<count($foods); $i++)
        {
            $food_data = $foods[$i]->extra_foods;
            array_push($extra_foods, $food_data);
            $review_data = $foods[$i]->extra_foods;
            array_push($user_reviews, $review_data);
        }
        return response()->json(['status' => 200, 'foods' => $foods, 'extra_foods' => $extra_foods, 'user_reviews' => $user_reviews]);
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
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $food = Food::where('slug', $slug)->first();
        return response()->json(['food' => $food]);
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
    public function food_search(Request $request)
    {
        $food = Food::where('name', 'LIKE', '%' . $request->search . '%')->with('extra_foods','user_reviews')->get();
        return response()->json($food);
    }
}
