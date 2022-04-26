<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
use Session;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','session_id','product_id','size','qunatity'];

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }

    public static function userCartItems(){
        if(Auth::check()){
            $userCartItems = Cart::with('product')->where('user_id',Auth::user()->id)->orderBy('id','Desc')->get()->toArray();
        }else{
            $userCartItems = Cart::with('product')->where('session_id',Session::get('session_id'))->orderBy('id','Desc')->get()->toArray();
        }
        return $userCartItems;
    }

    public static function ArrtibuteProductPrice($product_id,$size){
        $attrProPrice = ProductAttribute::select('price')->where(['product_id'=>$product_id,'size'=>$size])->first();
        return $attrProPrice['price'];
    }
}
