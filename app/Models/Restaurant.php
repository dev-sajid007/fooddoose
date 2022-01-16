<?php
namespace App\Models;
use App\Models\Backend\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Backend\RestaurantCategory;

class Restaurant extends Model
{
   protected $softDelete = true;
protected $table = 'restaurant';
    const PATH = 'images/restaurant_images';

public function merchant_rest()
{
   return $this->belongsTo(Merchant::class, 'merchant_id','id');

}

public function schedules()
{
   return $this->hasMany(Schedule::class, 'restaurant_id','id');

}

public function schedule()
{
   return $this->belongsTo(Schedule::class, 'restaurant_id','restaurant_id');

}

public function user()
{
   return $this->belongsTo(User::class, 'user_id','id');

}

public function restaurant_categories()
    {
        return $this->belongsToMany(Category::class, 'restaurant','restaurant_id', 'restaurant_id');
//        return $this->hasMany(RestaurantCategory::class, 'restaurant_id', 'restaurant_id');

    }

    public function categories()
    {
        return $this->hasMany(RestaurantCategory::class, 'restaurant_id', 'restaurant_id');

    }
}
