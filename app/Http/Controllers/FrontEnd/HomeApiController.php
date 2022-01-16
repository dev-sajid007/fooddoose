<?php

namespace App\Http\Controllers\FrontEnd;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class HomeApiController extends Controller
{
    public function rastaurant_item($slug){
        
        
         $data=DB::table('food')
         ->leftjoin('restaurant','restaurant.restaurant_id','=','food.restaurant_id')
        ->where('restaurant.slug','=',$slug)
        ->select('food.id','food.name','food.image','food.price','food.category_id','restaurant.restaurant_id','restaurant.restaurant_name','restaurant.slug')
        
            ->get() ; 
        
        return response()->json($data);
    }
    
    
}