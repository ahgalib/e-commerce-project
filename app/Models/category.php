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

    public function section(){
        return $this->belongsTo(section::class);
    }

    public static function categoryDetails($url){
        $categoryDetails = category::select('id','parent_id','category_name','url','description')->with('subcategories')->where('url',$url)->first()->toArray();
        //dd($cateDetails);die;
        if($categoryDetails['parent_id'] == 0){
            $breadcrums = '<a href="'.url($categoryDetails['url']).'">'.$categoryDetails['category_name'].'</a>';
        }else{
            $parentCategory = category::where('id',$categoryDetails['parent_id'])->first()->toArray();
            $breadcrums = '<a href="'.url($parentCategory['url']).'">'.$parentCategory['category_name'].'</a><span class="divider">/</span><a href="'.url($categoryDetails['url']).'">'.$categoryDetails['category_name'].'</a>';
        }
        $catIds = array();
        $catIds[] = $categoryDetails['id'];
        foreach ($categoryDetails['subcategories'] as $key => $subCat) {
            $catIds[] = $subCat['id'];
        }
        // dd($catIds);
       return array('catIds'=>$catIds,'categoryDetails'=>$categoryDetails,'breadcrums'=>$breadcrums);
    }
}
