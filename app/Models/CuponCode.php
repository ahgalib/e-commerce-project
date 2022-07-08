<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuponCode extends Model
{
    use HasFactory;
    protected $fillable = ['id','cupon_code','cupon_option','categories','users','cupon_type','amount_type','amount','expiry_date','status'];
}
