<?php
namespace App\Models\SuperAdmin\General_settings;
use Illuminate\Database\Eloquent\Model;
class FooterPageModel extends Model
{
protected $table = 'footer_pages';
protected $primaryKey = 'footer_page_id';
protected $fillable = ['footer_page_id','title','slug','meta_tags','header','sub_header','description','	position'];
public function validation() {
return [
'footer_page_id' => 'required',
'title' => 'required',
'title' => 'required',
'meta_tags' => 'required',
'header' => 'required',
'sub_header' => 'required',
'description' => 'required',
'position' => 'required',
];
}
}