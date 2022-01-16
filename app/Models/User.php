<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

use Notifiable;

protected $table = 'users';
   protected $guard = 'admin';
    const PATH = 'images/profile_images';
protected $fillable = [
'name', 'email', 'password','role_id','address',
];

protected $hidden = [
'password', 'remember_token',
];


protected $casts = [
'email_verified_at' => 'datetime',
];

public function role()
{
   return $this->belongsTo('App\Models\Role', 'role_id');
// return $this->belongsTo('App\Models\Role')->withDefault(function ($data) {
// foreach($data->getFillable() as $dt){
// $data[$dt] = __('Deleted');
// }
// });
}
public function IsSuper(){
if ($this->id == 1) {
return true;
}
return false;
}
public function sectionCheck($value){
$sections = explode(" , ", $this->role->section);
// dd($sections);
if (in_array($value, $sections)){
return true;
}else{
return false;
}
}

public function merchants()
{
   return $this->hasMany(Merchant::class, 'user_id','id');

}

public function merchant()
{
   return $this->belongsTo(Merchant::class, 'id','user_id');

}
public function restaurant()
{
   return $this->belongsTo(Restaurant::class, 'id','user_id');

}
public function restaurants()
{
   return $this->belongsTo(Restaurant::class, 'user_id','id');

}
public function schedule()
{
   return $this->belongsTo(Schedule::class, 'id','user_id');

}
public function schedules()
{
   return $this->belongsTo(Schedule::class, 'user_id','id');

}
    public function rider()
    {
        return $this->hasOne(Rider::class, 'user_id','id');

    }


}


