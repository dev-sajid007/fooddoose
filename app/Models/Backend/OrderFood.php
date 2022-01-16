<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderFood extends Model
{
    use HasFactory;
    
    protected $table = 'order_food';

    public function food()
    {
        return $this->belongsTo(Food::class, 'food_id', 'id');
    }
}
