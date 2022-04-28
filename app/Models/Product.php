<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['category_id','brand_id','section_id','product_name','product_code','product_color','product_price','product_discount','product_weight','product_video','main_image','description','wash_care','fabric','pattern','sleeve','fit','occassion','meta_title','meta_description','meta_keywords','is_featured','status'];

    public function category(){
        return $this->belongsTo(category::class);
    }

    public function section(){
        return $this->belongsTo(section::class);
    }

    public function ProductAttribute(){
         return $this->hasMany(ProductAttribute::class);
    }

    public function ProductImage(){
        return $this->hasMany(ProductImage::class);
    }

    public function Brand(){
        return $this->belongsTo(Brand::class);
    }

    public static function productFilters(){
         //Filter Array
         $productFilters['fabricArray'] = array('Cotton','Polyester','Woll');
         $productFilters['sleeverArray']= array('Ful Sleeve','Half Sleeve','Short Sleeve','Sleeveless');
         $productFilters['patternArray'] = array('Checked','Plain','Printed','Self','Solid');
         $productFilters['fitArray'] = array('Regular','Silm');
         $productFilters['occassionArray'] = array('Casual','Formal');

         return $productFilters;
    }

    public static function getProductDiscount($product_id){
        $productDiscount = Product::select('id','product_price','product_discount','category_id')->where('id',$product_id)->first()->toArray();
        $categoryDiscount = category::select('id','category_discount')->where('id',$productDiscount['category_id'])->first()->toArray();
        //return $productDiscount;
       // echo "<pre>";print_r($productDiscount);die;
       if($productDiscount['product_discount'] > 0){
            $discountedPrice =  $productDiscount['product_price'] - ($productDiscount['product_price'] * $productDiscount['product_discount']/100);
       }else if( $categoryDiscount['category_discount'] > 0){
            $discountedPrice =  $productDiscount['product_price'] - ($productDiscount['product_price'] * $categoryDiscount['category_discount']/100);
       }else{
           $discountedPrice = 0;
       }
       return $discountedPrice;
    }
}
