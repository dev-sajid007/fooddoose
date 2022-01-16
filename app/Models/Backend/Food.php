<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    const PATH = 'images/item_images';

    public function restaurant()
    {
        return $this->belongsTo(\App\Models\Restaurant::class, 'restaurant_id', 'restaurant_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
     public function extra_foods()
    {
        return $this->belongsToMany(Extra::class);
    }
       public function user_reviews()
    {
        return $this->hasMany(CustomerReview::class);
    }
}
