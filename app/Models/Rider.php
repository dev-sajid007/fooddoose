<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Rider extends Model
{
    protected $fillable = ['user_id','merchant_id','restaurant_id'];
    protected $table = 'riders';
}
