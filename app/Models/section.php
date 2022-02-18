<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class section extends Model
{
    use HasFactory;
    public static function sections(){
        $getSection = section::with('categories')->get();
        $getSection = json_decode(json_encode($getSection),true);
        return $getSection; 
        
    }

    public function categories(){
        return $this->hasMany(category::class)->where(['parent_id'=>'ROOT','status'=>1])->with('subcategories');
    }
}
