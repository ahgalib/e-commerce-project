<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    use HasFactory;
    protected $fillable = ['product_id','size','price','sku','stock','status'];
    
    public function Product(){
        return $this->belongsTo(Product::class);
    }
}
