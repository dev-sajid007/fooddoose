<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderExtraFood extends Model
{
    use HasFactory;

    protected $table = 'order_extra_item';

    public function extra_food()
    {
        return $this->belongsTo(Extra::class, 'extra_item_id', 'id');
    }
}
