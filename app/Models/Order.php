<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','name','address','district','phone','email','coupon_code','coupon_amount','payment_method','shiping_chages','grand_total'];

    public function orderProduct(){
        return $this->hasMany(OrderProduct::class);
    }
}
