<?php
namespace App\Models\SuperAdmin\General_settings;
use Illuminate\Database\Eloquent\Model;
class AboutUsModel extends Model
{
protected $table = 'about_us';
protected $primaryKey = 'about_us_id';
protected $fillable = ['about_us_id','header','sub_header','description','photo'];
public function validation() {
return [
'about_us_id' => 'required',
'header' => 'required',
];
}
}