<?php

namespace App\Models\Backend\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class CustomerModel extends Model
{
use Notifiable;
protected $table = 'customers';
protected $primaryKey = "id";
protected $hidden = [
'password', 'remember_token','email_verified_at',
];
protected $fillable = [
'first_name','last_name', 'email','address', 'password'
];
}