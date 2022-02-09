<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guard = [];

    public function category(){
        return $this->belongsTo(category::class);
    }

    public function section(){
        return $this->belongsTo(section::class);
    }
}
