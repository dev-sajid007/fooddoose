<?php
namespace App\Http\Controllers\Backend\Merchant;
use App\Http\Controllers\Controller;
use App\Models\Backend\Category;
use App\Models\Restaurant;
use App\Models\Backend\RestaurantCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $restaurants = Restaurant::where('user_id', Auth::id())->where('status', 1)->with('categories')->get();

        return view('merchant.category.categoryList', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return null
     */
    public function create()
    {
        $restaurants = Restaurant::where('user_id', Auth::id())->where('status', 1)->get();
        return view('merchant.category.categoryCreate', compact('restaurants'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return null
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'restaurant_id' => 'required',
        ]);

        $category = new Category;
        $category->user_id = auth()->id();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name, "-");
        $category->status = 1;
        $category->save();

        $last_category = Category::orderBy('id','desc')->first();
//        return $last_category;


        $restaurant_category = new RestaurantCategory;
        $restaurant_category->restaurant_id = $request->restaurant_id;
        $restaurant_category->category_id = $last_category->id;
        $restaurant_category->save();

        return redirect()->route('merchant.category.index')->with('message_success', 'Category has been created successfully!');
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
        $category = Restaurant::with('restaurant_categories')->get();
        return $category;
        return view('merchant.category.categoryEdit');
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
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function get_category($id)
    {
        $category = Restaurant::where('restaurant_id', $id)->with('restaurant_categories')->first();
        return response()->json(['data'=>$category->restaurant_categories]);
    }
}
