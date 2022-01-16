<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Backend\OrderExtraFood;
class Order extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }

    public function order_foods()
    {
        return $this->hasMany(OrderFood::class);
    }

    public function order_extra_foods()
    {
        return $this->hasMany(OrderExtraFood::class);
    }
}
