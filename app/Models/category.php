<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $fillable = ['parent_id','section_id','category_name','category_image','category_discount','description','url','meta_title','meta_description','meta_keywords','status'];

    public function subcategories(){
        return $this->hasMany(category::class,'parent_id')->where('status',1);
    }
}
