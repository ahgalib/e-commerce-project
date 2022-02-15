<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['category_id','section_id','product_name','product_code','product_color','product_price','product_discount','product_weight','product_video','main_image','description','wash_care','fabric','pattern','sleeve','fit','occassion','meta_title','meta_description','meta_keywords','is_featured','status'];

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
}
