<?php
namespace App\Models\Frontend;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
class CustomerModelApi extends Authenticatable implements JWTSubject
{
use Notifiable;
/**
* The attributes that are mass assignable.
*
* @var array
*/
protected $table ="customers";
protected $primaryKey = "id";
protected $fillable = [
'name', 'email','gender','phone','address','password',
];
/**
* The attributes that should be hidden for arrays.
*
* @var array
*/
protected $hidden = [
'password', 'remember_token','address','name','created_at','updated_at','email_verified_at',
];
public function validation() {
    return [
'name' => ['required', 'string', 'max:255'],
'email' => ['required', 'string', 'email', 'max:255', 'unique:customers'],
'address' => ['required'],
'phone' => ['required'],
'password' => ['required', 'string', 'min:6', 'confirmed'],
];
}

public function getJWTIdentifier()
{
return $this->getKey();
}
/**
* Return a key value array, containing any custom claims to be added to the JWT.
*
* @return array
*/
public function getJWTCustomClaims()
{
return [];
}
}