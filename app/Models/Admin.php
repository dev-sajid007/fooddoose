<?php
namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Admin extends Authenticatable
{
// protected $guard = 'admin';
protected $table = 'users';
protected $primaryKey = "id";
protected $fillable = [
'name', 'email', 'phone', 'password', 'role_id', 'created_at', 'updated_at', 'remember_token',
];
protected $hidden = [
'password', 'remember_token',
];
public function role()
{
     return $this->belongsTo('App\Models\Role', 'role_id');
    // return $this->belongsTo('App\Model\Role');
//     ->withDefault(function ($data) {
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
    // dd($value);
// $sections = explode(" , ", $this->role->section);
$sections = explode(" , ",$this->role);
// dd($sections);
if (in_array('orders', $sections)){
return true;
}else{
return false;
}
}
}