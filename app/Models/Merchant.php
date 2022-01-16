<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Merchant extends Model
{
protected $softDelete = true;
protected $table = 'merchant';

public function user()
{
   return $this->belongsTo(User::class, 'user_id','id');

}

public function restaurants()
{
   return $this->hasMany(Restaurant::class, 'merchant_id','merchant_id');

}

public function restaurant()
{
   return $this->belongsTo(Restaurant::class, 'merchant_id','merchant_id');

}

}
