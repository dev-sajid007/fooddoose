<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantCategory extends Model
{
    use HasFactory;

    protected $table = 'category_restaurant';

    public function categories ()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function category ()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function foods ()
    {
        return $this->hasMany(Food::class,'category_id', 'category_id');
    }

}
