<?php
namespace App\Http\Controllers\Backend\Merchant;
use App\Http\Controllers\Controller;
use App\Models\Backend\Category;
use App\Models\Backend\Restaurant;
use App\Models\Backend\RestaurantCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
/**
* Display a listing of the resource.
*
* @return null
*/
public function index()
{
$restaurants = Restaurant::where('user_id', 5)->where('status', 1)->with('categories')->get();
return view('merchant.category.categoryList', compact('restaurants'));
}
/**
* Show the form for creating a new resource.
*
* @return null
*/
public function create()
{
$restaurants = Restaurant::where('user_id', 5)->where('status', 1)->get();
return view('merchant.category.categoryCreate', compact('restaurants'));
}
/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{
// dd($request->restaurant_name);
$category = new Category;
$category->name = $request->name;
$category->slug = Str::slug($request->name, "-");
$category->status = 1;
$category->save();
$restaurant_category = new RestaurantCategory;
$restaurant_category->restaurant_id = $request->restaurant_id;
$restaurant_category->category_id = $category->id;
$restaurant_category->save();
return redirect()->route('merchant.category.index');
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